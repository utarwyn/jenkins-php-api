<?php

namespace Utarwyn\Jenkins\Error;

class ConnectionErrorException extends \Exception
{
    public function __construct($error)
    {
        parent::__construct('Jenkins connection error: ' . $error);
    }
}
