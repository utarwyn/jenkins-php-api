<?php

namespace Utarwyn\Jenkins\Server;

/**
 * Class CrumbData
 * @package Utarwyn\Jenkins\Server
 */
class CrumbData {

    /**
     * @var string The requested HTTP field header to validate the crumb.
     */
    private $requestField;

    /**
     * @var string The crumb to validate the request (CSRF protection).
     */
    private $crumb;

    /**
     * CrumbData constructor.
     * @param string $requestField
     * @param string $crumb
     */
    public function __construct(string $requestField, string $crumb) {
        $this->requestField = $requestField;
        $this->crumb = $crumb;
    }

    /**
     * @return string The requested HTTP field header to validate the crumb.
     */
    public function getRequestField(): string {
        return $this->requestField;
    }

    /**
     * @return string The crumb to validate the request (CSRF protection).
     */
    public function getCrumb(): string {
        return $this->crumb;
    }


}