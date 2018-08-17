Utarwyn\Jenkins\JenkinsEntity
===============

Class JenkinsEntity




* Class name: JenkinsEntity
* Namespace: Utarwyn\Jenkins
* This is an **abstract** class





Properties
----------


### $data

    private \Utarwyn\Jenkins\Helper\JsonData $data





* Visibility: **private**


Methods
-------


### __construct

    mixed Utarwyn\Jenkins\JenkinsEntity::__construct(string $objectAction, boolean $plain, array $params)

JenkinsEntity constructor.



* Visibility: **public**


#### Arguments
* $objectAction **string**
* $plain **boolean**
* $params **array**



### getData

    \Utarwyn\Jenkins\Helper\JsonData Utarwyn\Jenkins\JenkinsEntity::getData()





* Visibility: **protected**




### loadData

    void Utarwyn\Jenkins\JenkinsEntity::loadData(string $action, $plain, array $params)





* Visibility: **private**


#### Arguments
* $action **string**
* $plain **mixed**
* $params **array**


