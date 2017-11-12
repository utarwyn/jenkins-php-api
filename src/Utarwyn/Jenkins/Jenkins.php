<?php

namespace Utarwyn\Jenkins;

use Utarwyn\Jenkins\Entity\PluginManager;
use Utarwyn\Jenkins\Entity\Project;
use Utarwyn\Jenkins\Entity\UserManager;
use Utarwyn\Jenkins\Server\ApiAccessor;


class Jenkins extends JenkinsEntity {

    /**
     * @var string
     */
    protected $description;

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
     * @var PluginManager
     */
    private $pluginManager;

    /**
     * @var Project[]
     */
    protected $projects;

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
     * @var UserManager
     */
    private $userManager;

    /**
     * @var boolean
     */
    protected $useSecurity;

    public function __construct(string $serverUrl, string $username, $apiToken) {
        ApiAccessor::init($serverUrl, $username, $apiToken);
        parent::__construct("");
    }

    /**
     * @return string
     */
    public function getDescription(): string{
        return $this->description;
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
     * @return PluginManager
     */
    public function getPluginManager(): PluginManager {
        if (is_null($this->pluginManager))
            $this->pluginManager = new PluginManager();

        return $this->pluginManager;
    }

    /**
     * @return Project[]
     */
    public function getProjects(): array {
        $jsonProjects = $this->getData()->get("jobs");
        $projects     = array();

        foreach($jsonProjects as $project)
            array_push($projects, new Project($project->name));

        return $projects;
    }

    /**
     * @return int
     */
    public function getProjectsNb(): int {
        return count($this->getData()->get("jobs"));
    }

    /**
     * @param string $projectName
     * @return Project|null
     */
    public function getProject(string $projectName) {
        foreach($this->getData()->get("jobs") as $project)
            if ($project->name === $projectName)
                return new Project($project->name);

        return null;
    }

    /**
     * @return bool
     */
    public function isQuietingDown(): bool {
        return $this->quietingDown;
    }

    /**
     * @return int
     */
    public function getSlaveAgentPort(): int {
        return $this->slaveAgentPort;
    }

    /**
     * @return bool
     */
    public function isUsingCrumbs(): bool {
        return $this->useCrumbs;
    }

    /**
     * @return UserManager
     */
    public function getUserManager(): UserManager {
        if (is_null($this->userManager))
            $this->userManager = new UserManager();

        return $this->userManager;
    }

    /**
     * @return bool
     */
    public function isUsingSecurity(): bool {
        return $this->useSecurity;
    }

    /**
     * @return string Version of the Jenkins server.
     */
    public function getVersion() {
        return ApiAccessor::getInstance()->getJenkinsVersion();
    }

}