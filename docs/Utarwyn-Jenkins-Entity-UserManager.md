Utarwyn\Jenkins\Entity\UserManager
===============

Class UserManager




* Class name: UserManager
* Namespace: Utarwyn\Jenkins\Entity
* Parent class: [Utarwyn\Jenkins\JenkinsEntity](Utarwyn-Jenkins-JenkinsEntity.md)





Properties
----------


### $users

    protected mixed $users





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



### isUser

    boolean Utarwyn\Jenkins\Entity\UserManager::isUser(string $name)





* Visibility: **public**


#### Arguments
* $name **string**



### getNbUsers

    integer Utarwyn\Jenkins\Entity\UserManager::getNbUsers()





* Visibility: **public**




### getUser

    null|\Utarwyn\Jenkins\Entity\User Utarwyn\Jenkins\Entity\UserManager::getUser(string $name)





* Visibility: **public**


#### Arguments
* $name **string**



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


