<?php

namespace Midnite81\JsonParser\Exceptions;

class ControlCharacterException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_CTRL_CHAR	Control character error, possibly incorrectly encoded';

}