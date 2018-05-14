<?php

namespace Midnite81\JsonParser\Exceptions;

class InvalidPropertyName extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_INVALID_PROPERTY_NAME	A property name that cannot be encoded was given';

}