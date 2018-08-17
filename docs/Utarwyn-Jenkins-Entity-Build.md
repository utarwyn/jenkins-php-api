Utarwyn\Jenkins\Entity\Build
===============

Class Build




* Class name: Build
* Namespace: Utarwyn\Jenkins\Entity
* Parent class: [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)





Properties
----------


### $project

    private \Utarwyn\Jenkins\Entity\Project $project





* Visibility: **private**


### $building

    protected boolean $building





* Visibility: **protected**


### $description

    protected string $description





* Visibility: **protected**


### $displayName

    protected string $displayName





* Visibility: **protected**


### $duration

    protected integer $duration





* Visibility: **protected**


### $estimatedDuration

    protected integer $estimatedDuration





* Visibility: **protected**


### $fullDisplayName

    protected string $fullDisplayName





* Visibility: **protected**


### $id

    protected integer $id





* Visibility: **protected**


### $keepLog

    protected boolean $keepLog





* Visibility: **protected**


### $number

    protected integer $number





* Visibility: **protected**


### $queueId

    protected integer $queueId





* Visibility: **protected**


### $result

    protected string $result





* Visibility: **protected**


### $timestamp

    protected integer $timestamp





* Visibility: **protected**


### $url

    protected string $url





* Visibility: **protected**


### $builtOn

    protected string $builtOn





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



### isBuilding

    boolean Utarwyn\Jenkins\Entity\Build::isBuilding()





* Visibility: **public**




### getDescription

    string Utarwyn\Jenkins\Entity\Build::getDescription()





* Visibility: **public**




### getDisplayName

    string Utarwyn\Jenkins\Entity\Build::getDisplayName()





* Visibility: **public**




### getDuration

    integer Utarwyn\Jenkins\Entity\Build::getDuration()





* Visibility: **public**




### getEstimatedDuration

    integer Utarwyn\Jenkins\Entity\Build::getEstimatedDuration()





* Visibility: **public**




### getFullDisplayName

    string Utarwyn\Jenkins\Entity\Build::getFullDisplayName()





* Visibility: **public**




### getId

    integer Utarwyn\Jenkins\Entity\Build::getId()





* Visibility: **public**




### isKeepingLog

    boolean Utarwyn\Jenkins\Entity\Build::isKeepingLog()





* Visibility: **public**




### getNumber

    integer Utarwyn\Jenkins\Entity\Build::getNumber()





* Visibility: **public**




### getQueueId

    integer Utarwyn\Jenkins\Entity\Build::getQueueId()





* Visibility: **public**




### getResult

    \Utarwyn\Jenkins\Entity\BuildResult Utarwyn\Jenkins\Entity\Build::getResult()





* Visibility: **public**




### getTimestamp

    integer Utarwyn\Jenkins\Entity\Build::getTimestamp()





* Visibility: **public**




### getUrl

    string Utarwyn\Jenkins\Entity\Build::getUrl()





* Visibility: **public**




### getBuiltOn

    string Utarwyn\Jenkins\Entity\Build::getBuiltOn()





* Visibility: **public**




### getConsoleOutput

    string Utarwyn\Jenkins\Entity\Build::getConsoleOutput()





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


