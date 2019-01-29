<?php

namespace Utarwyn\Jenkins;

class JenkinsObject
{
    public function __construct($data)
    {
        foreach (get_object_vars($this) as $variable => $value) {
            $this->$variable = $data->$variable;
        }
    }
}
