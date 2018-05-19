<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\JenkinsEntity;

class UserManager extends JenkinsEntity
{

    /**
     * @var mixed
     */
    protected $users;

    public function __construct()
    {
        parent::__construct("asynchPeople");
    }

    /**
     * @param string $name
     * @return bool
     */
    public function isUser(string $name): bool
    {
        foreach ($this->users as $user) {
            if ($user->user->fullName === $name) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int
     */
    public function getNbUsers(): int
    {
        return count($this->users);
    }

    /**
     * @param string $name
     * @return null|User
     */
    public function getUser(string $name)
    {
        if (!$this->isUser($name)) {
            return null;
        }
        $userObj = null;

        foreach ($this->users as $user) {
            if ($user->user->fullName === $name) {
                $userObj = $user;
            }
        }

        if ($userObj == null) {
            return null;
        }
        return new User($userObj);
    }
}
