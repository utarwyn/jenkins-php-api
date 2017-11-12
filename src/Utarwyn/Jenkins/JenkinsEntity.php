<?php

namespace Utarwyn\Jenkins;

use Utarwyn\Jenkins\Helper\JsonData;
use Utarwyn\Jenkins\Server\ApiAccessor;


abstract class JenkinsEntity {

    /**
     * @var JsonData The API data of this entity.
     */
    private $data;

    public function __construct(string $objectAction, array $params = array()) {
        $this->loadData($objectAction, $params);
    }

    protected function getData() {
        return $this->data;
    }

    private function loadData(string $action, array $params) {
        $p = empty($params) ? "" : "?" . http_build_query($params);
        $this->data = ApiAccessor::getInstance()->get($action . $p);

        foreach (get_object_vars($this) as $variable => $value) {
            if ($variable === "data") continue;

            $defValue = (isset($this->$variable)) ? $this->$variable : "";
            $this->$variable = $this->data->get($variable, $defValue);
        }
    }

}