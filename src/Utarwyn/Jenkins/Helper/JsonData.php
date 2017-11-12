<?php

namespace Utarwyn\Jenkins\Helper;


class JsonData {

    /**
     * @var string The plain data (string) of the JSON.
     */
    private $plain;

    /**
     * @var \StdClass JSON Object
     */
    private $data;

    /**
     * JsonData constructor.
     * @param $jsonData string The plain text JSON data to analyze.
     */
    public function __construct($jsonData) {
        $this->plain = $jsonData;
        $this->data = json_decode($this->plain);
    }

    /**
     * @return string The plain text JSON.
     */
    public function getPlainJSON() {
        return $this->plain;
    }

    /**
     * @return \StdClass Get all the json data.
     */
    public function getAll() {
        return $this->data;
    }

    /**
     * @param string $key The key where the searched value is stored.
     * @param string $defaultValue The default value if the value wasn't found.
     * @return mixed
     */
    public function get(string $key, $defaultValue = '') {
        return isset($this->data->$key) ? $this->data->$key : $defaultValue;
    }

}