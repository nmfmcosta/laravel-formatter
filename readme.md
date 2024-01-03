Formatter Bundle
================

This is a fork from https://github.com/soapbox/laravel-formatter updated to work on Laravel 8, 9 and 10. 

**All credit goes to the original authors.**

A formatter package that will help you to easily convert between various formats such as XML, JSON, CSV, etc...

# Goals
The goals of this library are to allow the transformation of data formats from one type to another.
See Parsers and Formats to see supported input / output formats.

# Installation

Through command line:

```bash
composer require nmfmcosta/laravel-formatter
```

Through composer.json:

```json
{
  "require": {
    "nmfmcosta/laravel-formatter": "1.x"
  }
}

```

## Parsers
All of the following are supported formats that the formatter can read from.
* Array
* CSV
* JSON
* XML
* YAML

## Formats
All of the following are formats that are supported for output.
* Array
* CSV
* JSON
* XML
* YAML

## General Usage

__Including The Formatter__

```php
use LB\Formatter\Formatter;
```

__Supported Types__

```php
Formatter::JSON; //json
Formatter::CSV;  //csv
Formatter::XML;  //xml
Formatter::ARR;  //array
Formatter::YAML; //yaml
```

__Making Your First Formatter(s)__

```php
$formatter = Formatter::make($jsonString, Formatter::JSON);
$formatter = Formatter::make($yamlString, Formatter::YAML);
$formatter = Formatter::make($array, Formatter::ARR);
...
```

__Outputting From Your Formatter__

```php
$csv   = $formatter->toCsv();
$json  = $formatter->toJson();
$xml   = $formatter->toXml();
$array = $formatter->toArray();
$yaml  = $formatter->toYaml();
```

## Deprecated Functionality
The following have been deprecated from the library, however you can easily continue using them in your application

__Serialized Array__

```php
$serialized = serialize($formatter->toArray());
```

__PHP Export__

```php
$export = var_export($formatter->toArray());
```
