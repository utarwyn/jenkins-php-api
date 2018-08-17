Utarwyn\Jenkins\Helper\JsonData
===============

Class JsonData




* Class name: JsonData
* Namespace: Utarwyn\Jenkins\Helper





Properties
----------


### $plain

    private string $plain





* Visibility: **private**


### $data

    private \StdClass $data





* Visibility: **private**


Methods
-------


### __construct

    mixed Utarwyn\Jenkins\Helper\JsonData::__construct($jsonData)

JsonData constructor.



* Visibility: **public**


#### Arguments
* $jsonData **mixed** - &lt;p&gt;string The plain text JSON data to analyze.&lt;/p&gt;



### getPlainJSON

    string Utarwyn\Jenkins\Helper\JsonData::getPlainJSON()





* Visibility: **public**




### getAll

    \StdClass Utarwyn\Jenkins\Helper\JsonData::getAll()





* Visibility: **public**




### get

    mixed Utarwyn\Jenkins\Helper\JsonData::get(string $key, string $defaultValue)





* Visibility: **public**


#### Arguments
* $key **string** - &lt;p&gt;The key where the searched value is stored.&lt;/p&gt;
* $defaultValue **string** - &lt;p&gt;The default value if the value wasn&#039;t found.&lt;/p&gt;


