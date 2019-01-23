<?php

namespace Utarwyn\Jenkins\Server;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Utarwyn\Jenkins\Error\ConnectionErrorException;

/**
 * Class ApiClient
 * @package Utarwyn\Jenkins\Server
 */
class ApiClient
{
    /**
     * @var string Jenkins base URL
     */
    private $jenkinsUrl;

    /**
     * @var string Jenkins API Username.
     */
    private $jenkinsUsername;

    /**
     * @var string Jenkins API Token assigned to the user.
     */
    private $jenkinsApiToken;

    /**
     * @var CrumbData Data used by the API to identified an user.
     */
    private $jenkinsCrumbData;

    /**
     * @var string Version of the Jenkins server.
     */
    private $jenkinsVersion;

    /**
     * @var Client HTTP Client to access to the API.
     */
    private $client;

    /**
     * ApiClient constructor.
     * @param string $jenkinsUrl Jenkins base URL
     * @param string $username Username to connect to the Jenkins API
     * @param string $apiToken Token to connect to the Jenkins API
     */
    public function __construct(string $jenkinsUrl, string $username, string $apiToken)
    {
        $this->jenkinsUrl = $jenkinsUrl;
        $this->jenkinsUsername = $username;
        $this->jenkinsApiToken = $apiToken;

        // Configure the Guzzle client to access to the remote Jenkins api
        $this->client = new Client([
            'base_uri' => $jenkinsUrl,
            'verify' => false
        ]);
    }

    /**
     * @param string $action Action where we want information
     * @param bool $plain Should data be retreived in the plain format?
     * @return Object|string|null Returned data by the API
     */
    public function get(string $action, bool $plain = false)
    {
        $response = $this->request("GET", $action);

        // Version header.
        if (is_null($this->jenkinsVersion) && $response->hasHeader("x-jenkins")) {
            $this->jenkinsVersion = $response->getHeader("x-jenkins")[0];
        }

        if ($response->getStatusCode() === 200) {
            $content = $response->getBody()->getContents();
            return (!$plain) ? json_decode($content) : $content;
        }

        return null;
    }

    /**
     * @param string $action Action where we want to post information
     * @param array $params Params to post to the Jenkins action
     * @return ResponseInterface The response of the Jenkins API
     */
    public function post(string $action, array $params = array()): ResponseInterface
    {
        return $this->request("POST", $action, $params);
    }

    /**
     * @return string Version of the Jenkins instance
     */
    public function getJenkinsVersion()
    {
        return $this->jenkinsVersion;
    }

    /**
     * @param string $method HTTP Method of the request
     * @param string $action Action where the request has to be done
     * @param array $params Params to pass through the request
     * @return ResponseInterface The response of the Jenkins API
     */
    private function request(string $method, string $action, array $params = array()) : ResponseInterface
    {
        // Get crumb data to securise the request
        $crumb = $this->getCrumbData();

        try {
            $params = array(
                "headers" => array(
                    $crumb->getRequestField(), $crumb->getCrumb()
                ),
                "form_params" => $params
            );

            // Ajout de l'en-tête d'authentification si la connexion est nécessaire
            if (!empty($this->jenkinsUsername) && !empty($this->jenkinsApiToken)) {
                $params['auth'] = [$this->jenkinsUsername, $this->jenkinsApiToken];
            }

            return $this->client->request($method, $this->getActionEndpoint($action), $params);
        } catch (GuzzleException $e) {
            $r = $e->getResponse();
            throw new ConnectionErrorException("{$r->getStatusCode()} error ({$r->getReasonPhrase()}) when trying to access action {$action}.");
        }
    }

    /**
     * Generate the Jenkins API endpoint of an action.
     * @param string $action Path to resolve inside the Jenkins API
     * @return string Formatted action endpoint
     */
    private function getActionEndpoint(string $action): string
    {
        $action = trim($action, '/');
        $params = '';

        if (strpos($action, '?') !== false) {
            // Add parameters at the end of the url
            $sp = preg_split("/\?/", $action, 2);

            $params = '?' . $sp[1];
            $action = trim($sp[0], '/');
        }

        if (!empty($action)) {
            $action .= '/';
        }

        return "{$action}api/json$params";
    }

    /**
     * @return CrumbData Authentication data used by the Jenkins API
     */
    private function getCrumbData() : CrumbData
    {
        if (!is_null($this->jenkinsCrumbData)) {
            return $this->jenkinsCrumbData;
        }

        $params = array();

        // Ajout de l'en-tête d'authentification si nécessaire
        if (!empty($this->jenkinsUsername) && !empty($this->jenkinsApiToken)) {
            $params['auth'] = [$this->jenkinsUsername, $this->jenkinsApiToken];
        }

        $response = $this->client->get($this->getActionEndpoint('crumbIssuer'), $params);

        try {
            $status = $response->getStatusCode();

            if ($status === 200) {
                $data = \GuzzleHttp\json_decode($response->getBody()->getContents());
                $crumb = new CrumbData($data->crumbRequestField, $data->crumb);
    
                $this->jenkinsCrumbData = $crumb;
                return $crumb;
            } else {
                throw new ConnectionErrorException("{$this->jenkinsUrl} returns a {$status} HTTP code");
            }
        } catch (\Exception | \InvalidArgumentException $e) {
            throw new ConnectionErrorException("Jenkins instance not found at {$this->jenkinsUrl}");
        }
    }
}
