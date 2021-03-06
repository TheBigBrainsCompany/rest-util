The Big Brains Company - Rest Util
==============
[![Build Status](https://travis-ci.org/TheBigBrainsCompany/rest-util.png?branch=master)](https://travis-ci.org/TheBigBrainsCompany/rest-util)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/TheBigBrainsCompany/rest-util/badges/quality-score.png?s=258f15e1c04310af5bfae4ee55a05115a9f857f7)](https://scrutinizer-ci.com/g/TheBigBrainsCompany/rest-util/)

Rest util library for PHP.

This library implement some useful util classes for resolving recurrent issues in Rest(ful) APIs (i.e: Error handling).

Quick Start
-----------

Table of contents
-----------------

1. [Installation](#installation)
2. [Getting started](#getting-started)
3. [Usage](#usage)
4. [Run the test](#run-the-test)
5. [Contributing](#contributing)
6. [Requirements](#requirements)
7. [Authors](#authors)
8. [License](#license)

Description
-----------

Rest utilitary library for PHP

Installation
------------

Using [Composer](http://getcomposer.org/), just `$ composer require tbbc/rest-util` package or:

``` javascript
{
  "require": {
    "tbbc/rest-util": "dev-master"
  }
}
```

Usage
-----

Converting Exception into Error object:

1\. First you have to define an `ExceptionMapping`, for the sake of the example, 
   we use `PHP`, but a `YamlLoader` is also available:

```php
// Exception mapping configuration
$invalidArgumentExceptionMapping = new ExceptionMapping(array(
    'exceptionClassName'   => '\InvalidArgumentException',
    'factory'              => 'default',
    'httpStatusCode'       => 400,
    'errorCode'            => 400101,
    'errorMessage'         => null,
    'errorExtendedMessage' => 'Extended message',
    'errorMoreInfoUrl'     => 'http://api.my.tld/doc/error/400101',
));

```

2\. The `ExceptionMapping` must be added to `ExceptionMap`:

```php
$exceptionMap = new ExceptionMap();
$exceptionMap->add($invalidArgumentExceptionMapping);
```

3\. We plug the `ErrorResolver` with an ErrorFactory, a `DefaultErrorFactory` is bundled within the lib:

```php
// Error resolver initialization
$errorResolver       = new ErrorResolver($exceptionMap);
$defaultErrorFactory = new DefaultErrorFactory();
$errorResolver->registerFactory($defaultErrorFactory);
```

4\. Resolve error!

```php
$exception = new \InvalidArgumentException('This is an invalid argument exception');
$error     = $errorResolver->resolve($exception);
```

5\. The `$error` variable is now assigned an `ErrorInterface` object which implements a `toArray()` method
   to allow easy serialization method of your choice:

```php
print_r($error->toArray());
/* will output
Array
(
    [http_status_code] => 400
    [code]             => 400101
    [message]          => This is an invalid argument exception.
    [extended_message] => Extended message
    [more_info_url]    => http://api.my.tld/doc/error/400101
)
*/

echo json_encode($error->toArray());
/* And voilà! You get a ready to use json normalized error response body
{
    "http_status_code": 400,
    "code":             400101,
    "message":          "This is an invalid argument exception.",
    "extended_message": "Extended message",
    "more_info_url":    "http:\/\/api.my.tld\/doc\/error\/400101"
}
*/
```

For more concrete real life usage, take a look at our bundle for integrating the lib into a Symfony application:
[TbbcRestUtilBundle](https://github.com/TheBigBrainsCompany/TbbcRestUtilBundle).

Run the test
------------

First make sure you have installed all the dependencies, run:

`$ composer install --dev`

then, run the test from within the root directory:

`$ vendor/bin/phpunit`

Contributing
------------

1. Take a look at the [list of issues](http://github.com/TheBigBrainsCompany/rest-util/issues).
2. Fork
3. Write a test (for either new feature or bug)
4. Make a PR

Requirements
------------

* PHP 5.3+

Authors
-------

* Boris Guéry - guery.b@gmail.com - http://borisguery.com
* Benjamin Dulau - benjamin.dulau@gmail.com


License
-------

`The Big Brains Company - Rest Util` is licensed under the MIT License - see the LICENSE file for details

[![The Big Brains Company - Logo](http://tbbc-valid.thebigbrainscompany.com/assets/images/logo-tbbc.png)](http://thebigbrainscompany.com)
