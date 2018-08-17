Utarwyn\Jenkins\Entity\PluginManager
===============

Class PluginManager




* Class name: PluginManager
* Namespace: Utarwyn\Jenkins\Entity





Properties
----------


### $plugins

    protected array<mixed,\Utarwyn\Jenkins\Entity\Plugin> $plugins





* Visibility: **protected**


Methods
-------


### __construct

    mixed Utarwyn\Jenkins\Entity\PluginManager::__construct()

PluginManager constructor.



* Visibility: **public**




### getNbPlugins

    integer Utarwyn\Jenkins\Entity\PluginManager::getNbPlugins()





* Visibility: **public**




### getPlugin

    null|\Utarwyn\Jenkins\Entity\Plugin Utarwyn\Jenkins\Entity\PluginManager::getPlugin($name)





* Visibility: **public**


#### Arguments
* $name **mixed** - &lt;p&gt;string The name of the plugin to search.&lt;/p&gt;



### load

    mixed Utarwyn\Jenkins\Entity\PluginManager::load()

Allows to load all the plugins from the Jenkins Rest API.



* Visibility: **private**



