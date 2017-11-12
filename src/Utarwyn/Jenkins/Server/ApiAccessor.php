<?php

namespace Utarwyn\Jenkins\Server;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Utarwyn\Jenkins\Helper\JsonData;


class ApiAccessor {

    private static $instance;

    /**
     * @var string URL of Jenkins server.
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

    public function __construct(string $jenkinsUrl, string $username, string $apiToken) {
        $this->jenkinsUrl = trim($jenkinsUrl, "/");
        $this->jenkinsUsername = $username;
        $this->jenkinsApiToken = $apiToken;

        $this->client = new Client();
    }

    /**
     * @param string $action
     * @param bool $plain
     * @return null|string|JsonData
     */
    public function get(string $action, bool $plain = false) {
        $response = $this->request("GET", $action);

        // Version header.
        if (is_null($this->jenkinsVersion) && $response->hasHeader("x-jenkins"))
            $this->jenkinsVersion = $response->getHeader("x-jenkins")[0];

        if ($response->getStatusCode() === 200) {
            $content = $response->getBody()->getContents();
            return ($plain) ? $content : new JsonData($content);
        }

        return null;
    }

    public function post(string $action, array $params = array()): bool {
        $response = $this->request("POST", $action, $params);

        var_dump($response);
        return true;
    }

    public function getJenkinsVersion() {
        return $this->jenkinsVersion;
    }

    private function request(string $method, string $action, array $params = array()) : ResponseInterface {
        // Get crumb data to securise the request
        $crumb = $this->getCrumbData();

        return $this->client->request($method, $this->getActionEndpoint($action), array(
            "auth" => [$this->jenkinsUsername, $this->jenkinsApiToken],
            "headers" => array(
                $crumb->getRequestField(), $crumb->getCrumb()
            ),
            "form_params" => $params
        ));
    }

    /**
     * Generate the Jenkins URL with an action.
     * @param string $action Action to run.
     * @return string Endpoint of the action asked in parameter.
     */
    private function getActionEndpoint(string $action): string {
        $action = trim($action, "/");
        $params = "";

        // Add parameters add the end.
        if (strpos($action, "?") !== false) {
            $sp = preg_split("/\?/", $action, 2);

            $params = "?" . $sp[1];
            $action = trim($sp[0], "/");
        }

        if (!empty($action)) $action .= "/";

        return "{$this->jenkinsUrl}/{$action}api/json$params";
    }

    private function getCrumbData() : CrumbData {
        if (!is_null($this->jenkinsCrumbData))
            return $this->jenkinsCrumbData;

        $response = $this->client->get($this->getActionEndpoint("crumbIssuer"), array(
            "auth" => [$this->jenkinsUsername, $this->jenkinsApiToken]
        ));

        if ($response->getStatusCode() === 200) {
            $data = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $crumb = new CrumbData($data->crumbRequestField, $data->crumb);

            $this->jenkinsCrumbData = $crumb;
            return $crumb;
        } else {
            // Throw an error
        }

        return null;
    }

    public static function init(string $jenkinsUrl, string $username, string $apiToken): ApiAccessor {
        if (is_null(self::$instance))
            self::$instance = new ApiAccessor($jenkinsUrl, $username, $apiToken);

        return self::$instance;
    }

    public static function getInstance(): ApiAccessor {
        return self::$instance;
    }

}