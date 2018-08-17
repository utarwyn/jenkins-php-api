<?php

namespace Utarwyn\Jenkins\Server;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Utarwyn\Jenkins\Helper\JsonData;

/**
 * Class ApiAccessor
 * @package Utarwyn\Jenkins\Server
 */
class ApiAccessor
{
    /**
     * @var ApiAccessor Instance of the api accessor
     */
    private static $instance;

    /**
     * @var string Jenkins API Username.
     */
    private $jenkinsUsername;

    /**
     * @var string Jenkins API Token assigned to the user.
     */
    private $jenkinsApiToken;

    /**
     * @var CrumbData
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
     * ApiAccessor constructor.
     * @param string $jenkinsUrl
     * @param string $username
     * @param string $apiToken
     */
    private function __construct(string $jenkinsUrl, string $username, string $apiToken)
    {
        $this->jenkinsUsername = $username;
        $this->jenkinsApiToken = $apiToken;

        // Configure the Guzzle client to access to the remote Jenkins api
        $this->client = new Client([
            'base_uri' => trim($jenkinsUrl, "/"),
            'verify' => false
        ]);
    }

    /**
     * @param string $action
     * @param bool $plain
     * @return null|string|JsonData
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
            return ($plain) ? $content : new JsonData($content);
        }

        return null;
    }

    /**
     * @param string $action
     * @param array $params
     * @return ResponseInterface
     */
    public function post(string $action, array $params = array()): ResponseInterface
    {
        return $this->request("POST", $action, $params);
    }

    /**
     * @return string
     */
    public function getJenkinsVersion()
    {
        return $this->jenkinsVersion;
    }

    /**
     * @param string $method
     * @param string $action
     * @param array $params
     * @return ResponseInterface
     */
    private function request(string $method, string $action, array $params = array()) : ResponseInterface
    {
        // Get crumb data to securise the request
        $crumb = $this->getCrumbData();

        try {
            return $this->client->request($method, $this->getActionEndpoint($action), array(
                "auth" => [$this->jenkinsUsername, $this->jenkinsApiToken],
                "headers" => array(
                    $crumb->getRequestField(), $crumb->getCrumb()
                ),
                "form_params" => $params
            ));
        } catch (GuzzleException $e) {
            return null;
        }
    }

    /**
     * Generate the Jenkins URL with an action.
     * @param string $action Action to run.
     * @return string Endpoint of the action asked in parameter.
     */
    private function getActionEndpoint(string $action): string
    {
        $action = trim($action, "/");
        $params = "";

        // Add parameters add the end.
        if (strpos($action, "?") !== false) {
            $sp = preg_split("/\?/", $action, 2);

            $params = "?" . $sp[1];
            $action = trim($sp[0], "/");
        }

        if (!empty($action)) {
            $action .= "/";
        }

        return "/{$action}api/json$params";
    }

    /**
     * @return CrumbData
     */
    private function getCrumbData() : CrumbData
    {
        if (!is_null($this->jenkinsCrumbData)) {
            return $this->jenkinsCrumbData;
        }

        $response = $this->client->get($this->getActionEndpoint("crumbIssuer"), array(
            "auth" => [$this->jenkinsUsername, $this->jenkinsApiToken]
        ));

        if ($response->getStatusCode() === 200) {
            $data = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $crumb = new CrumbData($data->crumbRequestField, $data->crumb);

            $this->jenkinsCrumbData = $crumb;
            return $crumb;
        } else {
            // TODO Throw an error here to inform the user
        }

        return null;
    }

    /**
     * @param string $jenkinsUrl
     * @param string $username
     * @param string $apiToken
     * @return ApiAccessor
     */
    public static function init(string $jenkinsUrl, string $username, string $apiToken): ApiAccessor
    {
        if (is_null(self::$instance)) {
            self::$instance = new ApiAccessor($jenkinsUrl, $username, $apiToken);
        }

        return self::$instance;
    }

    /**
     * @return ApiAccessor
     */
    public static function getInstance(): ApiAccessor
    {
        return self::$instance;
    }
}
