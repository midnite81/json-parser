# JsonParser for PHP [![Latest Stable Version](https://poser.pugx.org/midnite81/json-parser/version)](https://packagist.org/packages/midnite81/json-parser) [![Total Downloads](https://poser.pugx.org/midnite81/json-parser/downloads)](https://packagist.org/packages/midnite81/json-parser) [![Latest Unstable Version](https://poser.pugx.org/midnite81/json-parser/v/unstable)](https://packagist.org/packages/midnite81/json-parser) [![License](https://poser.pugx.org/midnite81/json-parser/license.svg)](https://packagist.org/packages/midnite81/json-parser) [![Build](https://travis-ci.org/midnite81/json-parser.svg?branch=master)](https://travis-ci.org/midnite81/json-parser) [![Coverage Status](https://coveralls.io/repos/github/midnite81/json-parser/badge.svg?branch=master)](https://coveralls.io/github/midnite81/json-parser?branch=master) 

This package allows for Error Handling while encoding and decoding JSON.

To install through composer include the package in your `composer.json`.

    "midnite81/json-parser": "^1.0.0"

Run `composer install` or `composer update` to download the dependencies or you can run `composer require midnite81/json-parser`.

## Example usage

    use Midnite81\JsonParser\JsonParse;

    public function returnData() 
    { 
        // your encoded data 
        $myData = '{"message":"Hello World"}'; 
        
        try { 
            JsonParse::decode($myData);
        } catch (JsonException $e) { 
            die('Something went wrong: ' . $e->getMessage());
        }
    }