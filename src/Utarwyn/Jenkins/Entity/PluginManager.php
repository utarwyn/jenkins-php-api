<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\JenkinsEntity;
use Utarwyn\Jenkins\Server\ApiClient;

/**
 * Class PluginManager
 * @package Utarwyn\Jenkins\Entity
 */
class PluginManager extends JenkinsEntity
{
    /**
     * @var Plugin[] Plugins
     */
    protected $_plugins;

    /**
     * PluginManager constructor.
     * @param ApiClient $client Client to access to the API
     */
    public function __construct(ApiClient $client)
    {
        parent::__construct($client, 'pluginManager', array(
            'depth' => 5
        ));

        $this->load();
    }

    /**
     * @return int Number of plugins installed on the Jenkins server.
     */
    public function getNbPlugins()
    {
        return count($this->_plugins);
    }

    /**
     * @param $name string The name of the plugin to search.
     * @return null|Plugin The searched plugin or null if not found.
     */
    public function getPlugin(string $name)
    {
        foreach ($this->_plugins as $plugin) {
            if ($plugin->getShortName() == $name) {
                return $plugin;
            }
        }

        return null;
    }

    /**
     * Allows to load all the plugins from the Jenkins Rest API.
     */
    private function load()
    {
        $json = $this->getData();

        foreach ($json->plugins as $plugin) {
            $this->_plugins[] = new Plugin($plugin);
        }
    }
}
