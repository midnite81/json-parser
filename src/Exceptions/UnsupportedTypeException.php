<?php

namespace Midnite81\JsonParser\Exceptions;

class UnsupportedTypeException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_UNSUPPORTED_TYPE A value of a type that cannot be encoded was given';

}