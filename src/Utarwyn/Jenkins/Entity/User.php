<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\JenkinsEntity;
use Utarwyn\Jenkins\Server\ApiAccessor;


class User extends JenkinsEntity {

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var Project[] All views of the user.
     */
    private $views;


    public function __construct(\StdClass $userObj) {
        parent::__construct("user/{$userObj->user->fullName}");

        // Init user properties
        foreach ($this->getData()->get("property") as $property)
            foreach($property as $key => $value)
                if (property_exists($this, $key))
                    $this->$key = $value;
    }

    /**
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
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
    public function getFullName(): string {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /*
     * @return Project[] Views of the user.
     */
    public function getViews() {
        if (!is_null($this->views))
            return $this->views;

        $viewsJson = ApiAccessor::getInstance()->get("user/{$this->id}/my-views");

        foreach ($viewsJson->get("jobs") as $job)
            $this->views[] = new Project($job->name);

        return $this->views;
    }

    /**
     * @return int Number of views for the current user.
     */
    public function getViewNb(): int {
        if (!is_null($this->views))
            return count($this->views);

        $viewsJson = ApiAccessor::getInstance()->get("user/{$this->id}/my-views");
        return count($viewsJson->get("jobs"));
    }

}