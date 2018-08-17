Utarwyn\Jenkins\Entity\User
===============

Class User




* Class name: User
* Namespace: Utarwyn\Jenkins\Entity
* Parent class: [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)





Properties
----------


### $address

    protected string $address





* Visibility: **protected**


### $description

    protected string $description





* Visibility: **protected**


### $fullName

    protected string $fullName





* Visibility: **protected**


### $id

    protected string $id





* Visibility: **protected**


### $views

    private array<mixed,\Utarwyn\Jenkins\Entity\Project> $views





* Visibility: **private**


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



### getAddress

    string Utarwyn\Jenkins\Entity\User::getAddress()





* Visibility: **public**




### getDescription

    string Utarwyn\Jenkins\Entity\User::getDescription()





* Visibility: **public**




### getFullName

    string Utarwyn\Jenkins\Entity\User::getFullName()





* Visibility: **public**




### getId

    string Utarwyn\Jenkins\Entity\User::getId()





* Visibility: **public**




### getViews

    mixed Utarwyn\Jenkins\Entity\User::getViews()





* Visibility: **public**




### getViewNb

    integer Utarwyn\Jenkins\Entity\User::getViewNb()





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


