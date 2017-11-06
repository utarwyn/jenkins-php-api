<?php

namespace Utarwyn\Jenkins\Helper;


class JsonData {

    private $data;

    public function __construct($jsonData) {
        $this->data = json_decode($jsonData);
    }

    public function getAll() {
        return $this->data;
    }

    public function get(string $key, $defaultValue = '') {
        return isset($this->data->$key) ? $this->data->$key : $defaultValue;
    }

}