<?php

namespace Utarwyn\Jenkins;

use Utarwyn\Jenkins\Helper\JsonData;
use Utarwyn\Jenkins\Server\ApiAccessor;

/**
 * Class JenkinsEntity
 * @package Utarwyn\Jenkins
 */
abstract class JenkinsEntity
{

    /**
     * @var JsonData The API data of this entity.
     */
    private $data;

    /**
     * JenkinsEntity constructor.
     * @param string $objectAction
     * @param bool $plain
     * @param array $params
     */
    public function __construct(string $objectAction, $plain = false, array $params = array())
    {
        $this->loadData($objectAction, $plain, $params);
    }

    /**
     * @return JsonData
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * @param string $action
     * @param $plain
     * @param array $params
     * @return void
     */
    private function loadData(string $action, $plain, array $params): void
    {
        $p = empty($params) ? "" : "?" . http_build_query($params);
        $this->data = ApiAccessor::getInstance()->get($action . $p, $plain);

        if (is_null($this->data)) {
            return;
        }

        foreach (get_object_vars($this) as $variable => $value) {
            if ($variable === "data") {
                continue;
            }

            $defValue = (isset($this->$variable)) ? $this->$variable : "";
            $this->$variable = $this->data->get($variable, $defValue);
        }
    }
}
