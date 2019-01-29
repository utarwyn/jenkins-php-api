<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\JenkinsObject;

/**
 * Class Plugin
 * @package Utarwyn\Jenkins\Entity
 */
class Plugin extends JenkinsObject
{
    /**
     * @var bool
     */
    protected $active;

    /**
     * @var null|string
     */
    protected $backupVersion;

    /**
     * @var bool
     */
    protected $bundled;

    /**
     * @var bool
     */
    protected $deleted;

    /**
     * @var mixed
     */
    protected $dependencies;

    /**
     * @var bool
     */
    protected $downgradable;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var bool
     */
    protected $hasUpdate;

    /**
     * @var string
     */
    protected $longName;

    /**
     * @var bool
     */
    protected $pinned;

    /**
     * @var string
     */
    protected $requiredCoreVersion;

    /**
     * @var string
     */
    protected $shortName;

    /**
     * @var bool
     */
    protected $supportsDynamicLoad;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $version;

    /**
     * Plugin constructor.
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return null|string
     */
    public function getBackupVersion()
    {
        return $this->backupVersion;
    }

    /**
     * @return bool
     */
    public function isBundled(): bool
    {
        return $this->bundled;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @return mixed
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @return bool
     */
    public function isDowngradable(): bool
    {
        return $this->downgradable;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @return bool
     */
    public function isHasUpdate(): bool
    {
        return $this->hasUpdate;
    }

    /**
     * @return string
     */
    public function getLongName(): string
    {
        return $this->longName;
    }

    /**
     * @return bool
     */
    public function isPinned(): bool
    {
        return $this->pinned;
    }

    /**
     * @return string
     */
    public function getRequiredCoreVersion(): string
    {
        return $this->requiredCoreVersion;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @return bool
     */
    public function isSupportsDynamicLoad(): bool
    {
        return $this->supportsDynamicLoad;
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
    public function getVersion(): string
    {
        return $this->version;
    }
}
