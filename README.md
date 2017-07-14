
# Video Share - Backend test - CMP Group

This project has been created to solve a problem proposed by CMP Group as a backend technical test.

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.6.29-8892BF.svg?style=flat-square)](https://php.net/)
## Assumptions

* I followed PSR Naming conventions:
  - Abstract classes MUST be prefixed by Abstract: e.g. Psr\Foo\AbstractBar 
  - http://www.php-fig.org/bylaws/psr-naming-conventions/

* I used **setExpectedException()** instead of the **@expectedException** annotation following the own advise of **Sebastian Bergmann**: 
  - https://thephp.cc/news/2016/02/questioning-phpunit-best-practices
  
* I used **PHPDocs** to autogenerate a basic documentation
* I used the Symfony's **Yaml parser** (composer)
````php
use Symfony\Component\Yaml\Yaml;
````

## Installation steps
**1. Install composer dependencies : PHPUnit + Yaml Parser**
````bash
$ php composer.phar install
````
This will install all the dependencies found in the **composer.json** file:
```json
{
  "require-dev": {
    "phpunit/phpunit": "^5.7"
  }
}
```
**2. Create an alias for the script:**
 
````bash
$ alias import='php import.php'
````

## How to run your code / tests
Using the **"import"** command:
````bash
$ import
import: missing argument
Usage: import [source]

Sources:
  glorf     Glorf video source uses a JSON format
  flub      Flub video source uses a YAML format

Example:
  import glorf
````

Importing Glorf:
````bash
$ import glorf
importing: "science experiment goes wrong"; Url: http://glorf.com/videos/3; Tags: microwave,cats,peanutbutter
importing: "amazing dog can talk"; Url: http://glorf.com/videos/4; Tags: dog,amazing
  ````

Importing Flub:
````bash
$ import flub
importing: "funny cats"; Url: http://glorf.com/videos/asfds.com; Tags: cats,cute,funny
importing: "more cats"; Url: http://glorf.com/videos/asdfds.com; Tags: cats,ugly,funny
importing: "lots of dogs"; Url: http://glorf.com/videos/asasddfds.com; Tags: dogs,cute,funny
importing: "bird dance"; Url: http://glorf.com/videos/q34343.com; 
````


## Where to find your code

The source code is located in the **"src"** directory:

    docs
    └── [Documentation]
    feed-exports
    ├── flub.yaml
    └── glorf.json
    src
    ├── Controller
    │   ├── BaseController.php
    │   └── ImportController.php
    ├── Model
    │   └── Video.php    
    ├── Service
    │    ├── AbstractProvider.php
    │    ├── AbstractService.php
    │    ├── FlubService.php
    │    ├── GlorfService.php
    │    ├── JSONService.php
    │    ├── ServiceProvider.php
    │    └── YAMLService.php
    tests
    ├── mocks
    │   └── glorf-test-wrongKey.json
    ├── GlorfServiceTest.php
    ├── ImportControllerTest.php
    └── JSONServiceTest.php    
    vendor
    └── [PHPUnit + YAML Parser]
    autoload.php
    README.md
    SUMMARY.md
    import.php (script)
    composer.json
    composer.phar
 

## PHPUnit

PHPUnit tests are located in **tests** directory. To run them all use **phpunit tests/** like this:

```bash
$ phpunit tests/          
  PHPUnit 5.7.15 by Sebastian Bergmann and contributors.
  
  .......                                                             7 / 7 (100%)
  
  Time: 505 ms, Memory: 14.25MB
  
  OK (7 tests, 13 assertions)
```
Or if you prefer, you can have an overview of the different tests with **--testdox**:
```bash
$ phpunit --testdox tests/
  PHPUnit 5.7.15 by Sebastian Bergmann and contributors.
  
  tests\GlorfService
   [x] Import empty array ok
   [x] Import labels format array ok
  
  tests\ImportController
   [x] Import glorf ok
   [x] Import flub ok
  
  tests\JSONService
   [x] Read json ok 
   [x] Read json with wrong path exception
   [x] Read json without videos parameter exception
  ``` 
  You can also test all the classes using PHPUnit class per class.

## Docs

The documentation is generated using **phpdoc** with the following command:

```bash
$ phpdoc -d ./src -t ./docs
```

All documentation is created into the **/docs** directory:

* [ImportController Documentation](./docs/classes/Controller.ImportController.html)

* [Video Class Documentation](./docs/classes/model.Video.html)

* [ServiceProvider Documentation](./docs/classes/Service.ServiceProvider.html)
* [GlorfService Documentation](./docs/classes/Service.GlorfService.html)
* [FlubService Documentation](./docs/classes/Service.FlubService.html)
* [JSONService Documentation](./docs/classes/Service.JSONService.html)
* [YAMLService Documentation](./docs/classes/Service.YAMLService.html)



    
## What would you have done differently if you had had more time
There are too many things to do...

**I would like to:**
- Finish and complete all the unit tests (PHPunit)
- Manage properly all errors/exceptions
- Implement a log system
- Use a task queue to import the videos (RabbitMQ)
- Be more fosued on TDD
- Explain the code in a better way (using comments)

* * * 

## Was it your first time writing a unit test, using a particular framework, etc?

**CMS:**

I used for the first time the Typo3 CMS back in 2011.
When I was working for a web agency in Paris.

**Framework:**

After this experience, I started using Symfony and AngularJS in 2012. 
I had the change to develop 3 different projects from scratch using Symfony2.
I also developed a couple of projects using AngularJS.

**Unit test:**

My first unit test was using PHPUnit in 2013. 

I also used Selenium in 2014-2015.




        


