<?php

namespace Utarwyn\Jenkins\Entity;

use Utarwyn\Jenkins\Server\ApiAccessor;

class PluginManager
{

    /**
     * @var Plugin[] Plugins
     */
    protected $plugins;

    /**
     * PluginManager constructor.
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     * @return int Number of plugins installed on the Jenkins server.
     */
    public function getNbPlugins()
    {
        return count($this->plugins);
    }

    /**
     * @param $name string The name of the plugin to search.
     * @return null|Plugin The searched plugin or null if not found.
     */
    public function getPlugin(string $name)
    {
        foreach ($this->plugins as $plugin) {
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
        $json = ApiAccessor::getInstance()->get("pluginManager?depth=5");

        foreach ($json->get("plugins") as $pluginObj) {
            $this->plugins[] = new Plugin($pluginObj);
        }
    }
}
