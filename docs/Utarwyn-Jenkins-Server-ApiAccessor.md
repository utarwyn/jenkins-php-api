Utarwyn\Jenkins\Server\ApiAccessor
===============

Class ApiAccessor




* Class name: ApiAccessor
* Namespace: Utarwyn\Jenkins\Server





Properties
----------


### $instance

    private \Utarwyn\Jenkins\Server\ApiAccessor $instance





* Visibility: **private**
* This property is **static**.


### $jenkinsUsername

    private string $jenkinsUsername





* Visibility: **private**


### $jenkinsApiToken

    private string $jenkinsApiToken





* Visibility: **private**


### $jenkinsCrumbData

    private \Utarwyn\Jenkins\Server\CrumbData $jenkinsCrumbData





* Visibility: **private**


### $jenkinsVersion

    private string $jenkinsVersion





* Visibility: **private**


### $client

    private \GuzzleHttp\Client $client





* Visibility: **private**


Methods
-------


### __construct

    mixed Utarwyn\Jenkins\Server\ApiAccessor::__construct(string $jenkinsUrl, string $username, string $apiToken)

ApiAccessor constructor.



* Visibility: **private**


#### Arguments
* $jenkinsUrl **string**
* $username **string**
* $apiToken **string**



### get

    null|string|\Utarwyn\Jenkins\Helper\JsonData Utarwyn\Jenkins\Server\ApiAccessor::get(string $action, boolean $plain)





* Visibility: **public**


#### Arguments
* $action **string**
* $plain **boolean**



### post

    \Psr\Http\Message\ResponseInterface Utarwyn\Jenkins\Server\ApiAccessor::post(string $action, array $params)





* Visibility: **public**


#### Arguments
* $action **string**
* $params **array**



### getJenkinsVersion

    string Utarwyn\Jenkins\Server\ApiAccessor::getJenkinsVersion()





* Visibility: **public**




### request

    \Psr\Http\Message\ResponseInterface Utarwyn\Jenkins\Server\ApiAccessor::request(string $method, string $action, array $params)





* Visibility: **private**


#### Arguments
* $method **string**
* $action **string**
* $params **array**



### getActionEndpoint

    string Utarwyn\Jenkins\Server\ApiAccessor::getActionEndpoint(string $action)

Generate the Jenkins URL with an action.



* Visibility: **private**


#### Arguments
* $action **string** - &lt;p&gt;Action to run.&lt;/p&gt;



### getCrumbData

    \Utarwyn\Jenkins\Server\CrumbData Utarwyn\Jenkins\Server\ApiAccessor::getCrumbData()





* Visibility: **private**




### init

    \Utarwyn\Jenkins\Server\ApiAccessor Utarwyn\Jenkins\Server\ApiAccessor::init(string $jenkinsUrl, string $username, string $apiToken)





* Visibility: **public**
* This method is **static**.


#### Arguments
* $jenkinsUrl **string**
* $username **string**
* $apiToken **string**



### getInstance

    \Utarwyn\Jenkins\Server\ApiAccessor Utarwyn\Jenkins\Server\ApiAccessor::getInstance()





* Visibility: **public**
* This method is **static**.



