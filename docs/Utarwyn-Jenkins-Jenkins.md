Utarwyn\Jenkins\Jenkins
===============

Class Jenkins




* Class name: Jenkins
* Namespace: Utarwyn\Jenkins
* Parent class: [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)





Properties
----------


### $description

    protected string $description





* Visibility: **protected**


### $mode

    protected string $mode





* Visibility: **protected**


### $nodeDescription

    protected string $nodeDescription





* Visibility: **protected**


### $nodeName

    protected string $nodeName





* Visibility: **protected**


### $numExecutors

    protected integer $numExecutors





* Visibility: **protected**


### $pluginManager

    private \Utarwyn\Jenkins\Entity\PluginManager $pluginManager





* Visibility: **private**


### $projects

    protected array<mixed,\Utarwyn\Jenkins\Entity\Project> $projects





* Visibility: **protected**


### $quietingDown

    protected boolean $quietingDown





* Visibility: **protected**


### $slaveAgentPort

    protected integer $slaveAgentPort





* Visibility: **protected**


### $useCrumbs

    protected boolean $useCrumbs





* Visibility: **protected**


### $userManager

    private \Utarwyn\Jenkins\Entity\UserManager $userManager





* Visibility: **private**


### $useSecurity

    protected boolean $useSecurity





* Visibility: **protected**


### $data

    private \Utarwyn\Jenkins\Helper\JsonData $data





* Visibility: **private**


Methods
-------


### __construct

    mixed Utarwyn\Jenkins\JenkinsEntity::__construct(string $objectAction, boolean $plain, array $params)

JenkinsEntity constructor.



* Visibility: **public**
* This method is defined by [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)


#### Arguments
* $objectAction **string**
* $plain **boolean**
* $params **array**



### getDescription

    string Utarwyn\Jenkins\Jenkins::getDescription()





* Visibility: **public**




### getMode

    string Utarwyn\Jenkins\Jenkins::getMode()





* Visibility: **public**




### getNodeDescription

    string Utarwyn\Jenkins\Jenkins::getNodeDescription()





* Visibility: **public**




### getNodeName

    string Utarwyn\Jenkins\Jenkins::getNodeName()





* Visibility: **public**




### getNumExecutors

    integer Utarwyn\Jenkins\Jenkins::getNumExecutors()





* Visibility: **public**




### getPluginManager

    \Utarwyn\Jenkins\Entity\PluginManager Utarwyn\Jenkins\Jenkins::getPluginManager()





* Visibility: **public**




### getProjects

    array<mixed,\Utarwyn\Jenkins\Entity\Project> Utarwyn\Jenkins\Jenkins::getProjects()





* Visibility: **public**




### getViews

    mixed Utarwyn\Jenkins\Jenkins::getViews()





* Visibility: **public**




### getProjectsNb

    integer Utarwyn\Jenkins\Jenkins::getProjectsNb()





* Visibility: **public**




### getProject

    \Utarwyn\Jenkins\Entity\Project|null Utarwyn\Jenkins\Jenkins::getProject(string $projectName)





* Visibility: **public**


#### Arguments
* $projectName **string**



### getView

    mixed Utarwyn\Jenkins\Jenkins::getView(\Utarwyn\Jenkins\string $viewName)





* Visibility: **public**


#### Arguments
* $viewName **Utarwyn\Jenkins\string**



### isQuietingDown

    boolean Utarwyn\Jenkins\Jenkins::isQuietingDown()





* Visibility: **public**




### getSlaveAgentPort

    integer Utarwyn\Jenkins\Jenkins::getSlaveAgentPort()





* Visibility: **public**




### isUsingCrumbs

    boolean Utarwyn\Jenkins\Jenkins::isUsingCrumbs()





* Visibility: **public**




### getUserManager

    \Utarwyn\Jenkins\Entity\UserManager Utarwyn\Jenkins\Jenkins::getUserManager()





* Visibility: **public**




### isUsingSecurity

    boolean Utarwyn\Jenkins\Jenkins::isUsingSecurity()





* Visibility: **public**




### getVersion

    string Utarwyn\Jenkins\Jenkins::getVersion()





* Visibility: **public**




### getData

    \Utarwyn\Jenkins\Helper\JsonData Utarwyn\Jenkins\JenkinsEntity::getData()





* Visibility: **protected**
* This method is defined by [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)




### loadData

    void Utarwyn\Jenkins\JenkinsEntity::loadData(string $action, $plain, array $params)





* Visibility: **private**
* This method is defined by [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)


#### Arguments
* $action **string**
* $plain **mixed**
* $params **array**


