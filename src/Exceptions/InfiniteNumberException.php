<?php

namespace Midnite81\JsonParser\Exceptions;

class InfiniteNumberException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_INF_OR_NAN One or more NAN or INF values in the value to be encoded';

}