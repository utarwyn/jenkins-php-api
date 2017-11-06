<?php

namespace Utarwyn\Jenkins\Entity;


use Utarwyn\Jenkins\JenkinsEntity;
use Utarwyn\Jenkins\Server\ApiAccessor;

class Job extends JenkinsEntity {

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var string
     */
    protected $fullDisplayName;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var boolean
     */
    protected $buildable;

    protected $builds;

    /**
     * @var string
     */
    protected $color;

    protected $firstBuild;

    protected $healthReport;

    /**
     * @var boolean
     */
    protected $inQueue;

    /**
     * @var boolean
     */
    protected $keepDependencies;

    protected $lastBuild;

    protected $lastCompleteBuild;

    protected $lastFailedBuild;

    protected $lastStableBuild;

    protected $lastSuccessfulBuild;

    protected $lastUnstableBuild;

    protected $lastUnsuccessfulBuild;

    /**
     * @var integer
     */
    protected $nextBuildNumber;

    /**
     * @var boolean
     */
    protected $concurrentBuild;

    public function __construct(ApiAccessor $apiAccessor, string $name) {
        parent::__construct($apiAccessor, "job/$name");
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
     * @return string
     */
    public function getFullDisplayName(): string {
        return $this->fullDisplayName;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function isBuildable(): bool {
        return $this->buildable;
    }

    /**
     * @return string
     */
    public function getColor(): string {
        return $this->color;
    }

    /**
     * @return bool
     */
    public function isInQueue(): bool {
        return $this->inQueue;
    }

    /**
     * @return bool
     */
    public function isKeepDependencies(): bool {
        return $this->keepDependencies;
    }

    /**
     * @return int
     */
    public function getNextBuildNumber(): int {
        return $this->nextBuildNumber;
    }



}