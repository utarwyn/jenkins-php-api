<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\JenkinsEntity;
use Utarwyn\Jenkins\Server\ApiAccessor;

/**
 * Class User
 * @package Utarwyn\Jenkins\Entity
 */
class User extends JenkinsEntity
{

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


    public function __construct($client, \StdClass $userObj)
    {
        parent::__construct($client, "user/{$userObj->user->fullName}");

        // Init user properties
        foreach ($this->getData()->property as $property) {
            foreach ($property as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /*
     * @return Project[] Views of the user.
     */
    public function getViews()
    {
        if (!is_null($this->views)) {
            return $this->views;
        }

        $views = $this->client->get("user/{$this->id}/my-views");

        foreach ($views->jobs as $job) {
            $this->views[] = new Project($this->client, $job->name);
        }

        return $this->views;
    }

    /**
     * @return int Number of views for the current user.
     */
    public function getViewNb(): int
    {
        if (!is_null($this->views)) {
            return count($this->views);
        }

        return count($this->client->get("user/{$this->id}/my-views")->jobs);
    }
}
