<?php

namespace Utarwyn\Jenkins;

use Utarwyn\Jenkins\Entity\Job;
use Utarwyn\Jenkins\Server\ApiAccessor;


class Jenkins extends JenkinsEntity {
    /**
     * @var ApiAccessor Class to manage the connection at the Jenkins API.
     */
    private $apiClient;

    /**
     * @var string
     */
    protected $mode;

    /**
     * @var string
     */
    protected $nodeDescription;

    /**
     * @var string
     */
    protected $nodeName;

    /**
     * @var integer
     */
    protected $numExecutors;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Job[]
     */
    protected $jobs;

    /**
     * @var boolean
     */
    protected $quietingDown;

    /**
     * @var integer
     */
    protected $slaveAgentPort;

    /**
     * @var boolean
     */
    protected $useCrumbs;

    /**
     * @var boolean
     */
    protected $useSecurity;

    public function __construct(string $serverUrl, string $username, $apiToken) {
        $this->apiClient = new ApiAccessor($serverUrl, $username, $apiToken);
        parent::__construct($this->apiClient, "");
    }

    /**
     * @return string
     */
    public function getMode(): string {
        return $this->mode;
    }

    /**
     * @return string
     */
    public function getNodeDescription(): string {
        return $this->nodeDescription;
    }

    /**
     * @return string
     */
    public function getNodeName(): string {
        return $this->nodeName;
    }

    /**
     * @return int
     */
    public function getNumExecutors(): int{
        return $this->numExecutors;
    }

    /**
     * @return string
     */
    public function getDescription(): string{
        return $this->description;
    }

    /**
     * @return Job[]
     */
    public function getJobs(): array {
        $jsonJobs = $this->getData()->get("jobs");
        $jobs     = array();

        foreach($jsonJobs as $job)
            array_push($jobs, new Job($this->apiClient, $job->name));

        return $jobs;
    }

    /**
     * @return int
     */
    public function getJobsNb(): int {
        return count($this->getData()->get("jobs"));
    }

    /**
     * @param string $jobName
     * @return Job|null
     */
    public function getJob(string $jobName) {
        foreach($this->getData()->get("jobs") as $job)
            if ($job->name === $jobName)
                return new Job($this->apiClient, $job->name);

        return null;
    }

    /**
     * @return bool
     */
    public function isQuietingDown(): bool{
        return $this->quietingDown;
    }

    /**
     * @return int
     */
    public function getSlaveAgentPort(): int{
        return $this->slaveAgentPort;
    }

    /**
     * @return bool
     */
    public function isUsingCrumbs(): bool{
        return $this->useCrumbs;
    }

    /**
     * @return bool
     */
    public function isUsingSecurity(): bool{
        return $this->useSecurity;
    }



}