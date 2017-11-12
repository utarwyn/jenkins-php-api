<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\JenkinsEntity;
use Utarwyn\Jenkins\Server\ApiAccessor;


class Build extends JenkinsEntity {

    /**
     * @var Project project
     */
    private $project;

    /**
     * @var boolean
     */
    protected $building;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var int
     */
    protected $estimatedDuration;

    /**
     * @var string
     */
    protected $fullDisplayName;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var boolean
     */
    protected $keepLog;

    /**
     * @var int
     */
    protected $number;

    /**
     * @var int
     */
    protected $queueId;

    /**
     * @var string
     */
    protected $result;

    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $builtOn;

    public function __construct(Project $project, int $buildId) {
        parent::__construct("job/{$project->getName()}/$buildId");
        $this->project = $project;
    }

    /**
     * @return bool
     */
    public function isBuilding(): bool {
        return $this->building;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string {
        return $this->displayName;
    }

    /**
     * @return int
     */
    public function getDuration(): int {
        return $this->duration;
    }

    /**
     * @return int
     */
    public function getEstimatedDuration(): int {
        return $this->estimatedDuration;
    }

    /**
     * @return string
     */
    public function getFullDisplayName(): string {
        return $this->fullDisplayName;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isKeepingLog(): bool {
        return $this->keepLog;
    }

    /**
     * @return int
     */
    public function getNumber(): int {
        return $this->number;
    }

    /**
     * @return int
     */
    public function getQueueId(): int {
        return $this->queueId;
    }

    /**
     * @return BuildResult
     */
    public function getResult() {
        return BuildResult::fromResult($this->result);
    }

    /**
     * @return int
     */
    public function getTimestamp(): int {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getBuiltOn(): string {
        return $this->builtOn;
    }

    /*
     * @return string
     */
    public function getConsoleOutput() {
        return ApiAccessor::getInstance()->get("job/{$this->project->getName()}/{$this->id}/consoleText", true);
    }

}