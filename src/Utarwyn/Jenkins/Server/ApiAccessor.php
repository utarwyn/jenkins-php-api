<?php

namespace Utarwyn\Jenkins\Server;

use GuzzleHttp\Client;
use Utarwyn\Jenkins\Helper\JsonData;


class ApiAccessor {

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
     * @var Client HTTP Client to access to the API.
     */
    private $client;

    public function __construct(string $jenkinsUrl, string $username, string $apiToken) {
        $this->jenkinsUrl = trim($jenkinsUrl, "/");
        $this->jenkinsUsername = $username;
        $this->jenkinsApiToken = $apiToken;

        $this->client = new Client();
    }

    public function request(string $method, string $action, array $params = array()) : JsonData {
        // Get crumb data to securise the request
        $crumb = $this->getCrumbData();

        $response = $this->client->request($method, $this->getActionEndpoint($action), array(
            "auth" => [$this->jenkinsUsername, $this->jenkinsApiToken],
            "headers" => array(
                $crumb->getRequestField(), $crumb->getCrumb()
            ),
            "query" => $params
        ));

        if ($response->getStatusCode() === 200) {
            return new JsonData($response->getBody()->getContents());
        } else {

        }

        return null;
    }

    /**
     * Generate the Jenkins URL with an action.
     * @param string $action Action to run.
     * @return string Endpoint of the action asked in parameter.
     */
    private function getActionEndpoint(string $action): string {
        return "{$this->jenkinsUrl}/$action/api/json";
    }

    private function getCrumbData() : CrumbData {
        if (!is_null($this->jenkinsCrumbData))
            return $this->jenkinsCrumbData;

        $reponse = $this->client->get($this->getActionEndpoint("crumbIssuer"), array(
            "auth" => [$this->jenkinsUsername, $this->jenkinsApiToken]
        ));

        if ($reponse->getStatusCode() === 200) {
            $data = \GuzzleHttp\json_decode($reponse->getBody()->getContents());
            $crumb = new CrumbData($data->crumbRequestField, $data->crumb);

            $this->jenkinsCrumbData = $crumb;
            return $crumb;
        } else {
            // Throw an error
        }

        return null;
    }

}