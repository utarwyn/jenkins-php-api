<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\JenkinsObject;

class QueueItem extends JenkinsObject
{
    protected $id;

    protected $blocked;

    protected $buildable;

    protected $inQueueSince;

    protected $params;

    protected $stuck;

    protected $task;

    protected $url;

    protected $why;

    protected $buildableStartMilliseconds;

    public function __construct($data)
    {
        parent::__construct($data);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isBlocked(): bool
    {
        return $this->blocked;
    }

    public function isBuildable(): bool
    {
        return $this->buildable;
    }

    public function getInQueueSince(): int
    {
        return $this->inQueueSince;
    }

    public function getParams(): string
    {
        return $this->params;
    }

    public function isStuck(): bool
    {
        return $this->stuck;
    }

    public function getTask(): array
    {
        return $this->task;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getWhy(): string
    {
        return $this->why;
    }

    public function getBuildableStartMilliseconds(): int
    {
        return $this->buildableStartMilliseconds;
    }
}
