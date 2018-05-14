<?php

namespace Midnite81\JsonParser\Exceptions;

class InvalidOrMalformedJsonException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_STATE_MISMATCH Invalid or malformed JSON';
}