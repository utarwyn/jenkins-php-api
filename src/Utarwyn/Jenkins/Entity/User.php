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


    public function __construct(ApiAccessor $apiAccessor, $userObj) {
        var_dump($userObj);
        parent::__construct($apiAccessor, "user/$name");

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



}