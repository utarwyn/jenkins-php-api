<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\JenkinsEntity;

class View extends JenkinsEntity
{

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $name;

    protected $url;

    protected $property;

    protected $jobs;

    public function __construct(string $name)
    {
        parent::__construct("view/$name");
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getJobs()
    {
        return $this->jobs;
    }
}
