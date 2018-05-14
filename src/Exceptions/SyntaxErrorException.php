<?php

namespace Midnite81\JsonParser\Exceptions;

class SyntaxErrorException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_SYNTAX Syntax error';
}