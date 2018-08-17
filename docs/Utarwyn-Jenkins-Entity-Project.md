Utarwyn\Jenkins\Entity\Project
===============

Class Project




* Class name: Project
* Namespace: Utarwyn\Jenkins\Entity
* Parent class: [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)





Properties
----------


### $description

    protected string $description





* Visibility: **protected**


### $displayName

    protected string $displayName





* Visibility: **protected**


### $fullDisplayName

    protected string $fullDisplayName





* Visibility: **protected**


### $name

    protected string $name





* Visibility: **protected**


### $url

    protected string $url





* Visibility: **protected**


### $buildable

    protected boolean $buildable





* Visibility: **protected**


### $builds

    protected mixed $builds





* Visibility: **protected**


### $color

    protected string $color





* Visibility: **protected**


### $firstBuild

    protected mixed $firstBuild





* Visibility: **protected**


### $healthReport

    protected mixed $healthReport





* Visibility: **protected**


### $inQueue

    protected boolean $inQueue





* Visibility: **protected**


### $keepDependencies

    protected boolean $keepDependencies





* Visibility: **protected**


### $nextBuildNumber

    protected integer $nextBuildNumber





* Visibility: **protected**


### $concurrentBuild

    protected boolean $concurrentBuild





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

    string Utarwyn\Jenkins\Entity\Project::getDescription()





* Visibility: **public**




### getDisplayName

    string Utarwyn\Jenkins\Entity\Project::getDisplayName()





* Visibility: **public**




### getFullDisplayName

    string Utarwyn\Jenkins\Entity\Project::getFullDisplayName()





* Visibility: **public**




### getName

    string Utarwyn\Jenkins\Entity\Project::getName()





* Visibility: **public**




### getUrl

    string Utarwyn\Jenkins\Entity\Project::getUrl()





* Visibility: **public**




### isBuildable

    boolean Utarwyn\Jenkins\Entity\Project::isBuildable()





* Visibility: **public**




### getColor

    string Utarwyn\Jenkins\Entity\Project::getColor()





* Visibility: **public**




### isInQueue

    boolean Utarwyn\Jenkins\Entity\Project::isInQueue()





* Visibility: **public**




### isKeepDependencies

    boolean Utarwyn\Jenkins\Entity\Project::isKeepDependencies()





* Visibility: **public**




### getBuild

    \Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getBuild(integer $id)





* Visibility: **public**


#### Arguments
* $id **integer**



### getFirstBuild

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getFirstBuild()





* Visibility: **public**




### getLastBuild

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getLastBuild()





* Visibility: **public**




### getLastCompletedBuild

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getLastCompletedBuild()





* Visibility: **public**




### getLastFailedBuild

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getLastFailedBuild()





* Visibility: **public**




### getLastStableBuild

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getLastStableBuild()





* Visibility: **public**




### getLastSuccessful

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getLastSuccessful()





* Visibility: **public**




### getLastUnstableBuild

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getLastUnstableBuild()





* Visibility: **public**




### getLastUnsuccessfulBuild

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getLastUnsuccessfulBuild()





* Visibility: **public**




### getNextBuildNumber

    integer Utarwyn\Jenkins\Entity\Project::getNextBuildNumber()





* Visibility: **public**




### getBuilds

    mixed Utarwyn\Jenkins\Entity\Project::getBuilds()





* Visibility: **public**




### getBuildFromJson

    null|\Utarwyn\Jenkins\Entity\Build Utarwyn\Jenkins\Entity\Project::getBuildFromJson(\Utarwyn\Jenkins\Entity\Project $project, $jsonKey)





* Visibility: **private**
* This method is **static**.


#### Arguments
* $project **[Utarwyn\Jenkins\Entity\Project](Utarwyn-Jenkins-Entity-Project.md)**
* $jsonKey **mixed**



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


