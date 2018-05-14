<?php

namespace Midnite81\JsonParser\Exceptions;

class MalformedUtf16CharactersException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_UTF16	Malformed UTF-16 characters, possibly incorrectly encoded';

}