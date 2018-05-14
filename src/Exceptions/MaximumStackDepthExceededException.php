<?php

namespace Midnite81\JsonParser\Exceptions;

class MaximumStackDepthExceededException extends JsonException
{
    protected $jsonErrorMessage = 'JSON_ERROR_DEPTH The maximum stack depth has been exceeded';

}