<?php

namespace Midnite81\JsonParser\Exceptions;

use Exception;

abstract class JsonException extends Exception
{
    /**
     * MaximumStackDepthExceededException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if (empty($message)) {
            $message = $this->jsonErrorMessage;
        }

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the Json Error Message
     */
    public function getJsonErrorMessage()
    {
        $this->jsonErrorMessage;
    }
}