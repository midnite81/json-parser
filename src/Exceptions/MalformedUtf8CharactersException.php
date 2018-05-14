<?php

namespace Midnite81\JsonParser\Exceptions;

class MalformedUtf8CharactersException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_UTF8	Malformed UTF-8 characters, possibly incorrectly encoded';

}