<?php

namespace Utarwyn\Jenkins;

use Utarwyn\Jenkins\Server\ApiClient;

/**
 * Class JenkinsEntity
 * @package Utarwyn\Jenkins
 */
abstract class JenkinsEntity
{
    /**
     * @var ApiClient Client to connect to the Jenkins API
     */
    protected $client;

    /**
     * @var Object|string Data returned by the API for this entity
     */
    private $data;

    /**
     * JenkinsEntity constructor.
     * @param string $objectAction
     * @param bool $plain
     * @param array $params
     */
    public function __construct(ApiClient $client, string $objectAction, array $params = array(), $plain = false)
    {
        $this->client = $client;
        $this->loadData($objectAction, $params, $plain);
    }

    /**
     * @return Object|string Data of the entity
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * Load data from the Jenkins API
     * @param string $action Action where the data is located
     * @param array $params Params to send to the API
     * @param bool $plain Should the data be resolved as a plain text?
     */
    private function loadData(string $action, array $params, bool $plain): void
    {
        $p = empty($params) ? "" : "?" . http_build_query($params);
        $this->data = $this->client->get($action . $p, $plain);

        if (!is_null($this->data) && !$plain) {
            foreach (get_object_vars($this) as $variable => $value) {
                if ($variable === "data" || strpos($variable, '_') === 0) {
                    continue;
                }

                $defValue = (isset($this->$variable)) ? $this->$variable : "";
                $isset = isset($this->data->$variable);

                $this->$variable = $isset ? $this->data->$variable : $defValue;
            }
        }
    }
}
