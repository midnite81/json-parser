<?php

namespace Midnite81\JsonParser\Exceptions;

class RecursiveReferencesException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_RECURSION	One or more recursive references in the value to be encoded';

}