Utarwyn\Jenkins\Entity\View
===============

Class JenkinsEntity




* Class name: View
* Namespace: Utarwyn\Jenkins\Entity
* Parent class: [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)





Properties
----------


### $description

    protected string $description





* Visibility: **protected**


### $name

    protected string $name





* Visibility: **protected**


### $url

    protected mixed $url





* Visibility: **protected**


### $property

    protected mixed $property





* Visibility: **protected**


### $jobs

    protected mixed $jobs





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



### getName

    string Utarwyn\Jenkins\Entity\View::getName()





* Visibility: **public**




### getUrl

    string Utarwyn\Jenkins\Entity\View::getUrl()





* Visibility: **public**




### getDescription

    string Utarwyn\Jenkins\Entity\View::getDescription()





* Visibility: **public**




### getJobs

    mixed Utarwyn\Jenkins\Entity\View::getJobs()





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


