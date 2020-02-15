<?php

namespace Midnite81\JsonParser;

use Midnite81\JsonParser\Exceptions\ControlCharacterException;
use Midnite81\JsonParser\Exceptions\InfiniteNumberException;
use Midnite81\JsonParser\Exceptions\InvalidOrMalformedJsonException;
use Midnite81\JsonParser\Exceptions\InvalidPropertyName;
use Midnite81\JsonParser\Exceptions\MalformedUtf16CharactersException;
use Midnite81\JsonParser\Exceptions\MalformedUtf8CharactersException;
use Midnite81\JsonParser\Exceptions\MaximumStackDepthExceededException;
use Midnite81\JsonParser\Exceptions\RecursiveReferencesException;
use Midnite81\JsonParser\Exceptions\SyntaxErrorException;
use Midnite81\JsonParser\Exceptions\UnsupportedTypeException;

class JsonParse
{

    /**
     * @param     $value
     * @param int $options
     * @param int $depth
     * @return string
     */
    public static function encode($value, $options = 0, $depth = 512)
    {
        $result = json_encode($value, $options, $depth);

        if ($result) {
            return $result;
        }

        static::throwException(json_last_error());
    }

    /**
     * Json Decode
     * (throwing exception if it errors)
     *
     * @param      $json
     * @param bool $assoc
     * @param int  $depth
     * @param int  $options
     * @return mixed
     */
    public static function decode($json, $assoc = false, $depth = 512, $options = 0)
    {
        $result = json_decode($json, $assoc, $depth, $options);

        if (! empty($result)) {
            return $result;
        }

        static::throwException(json_last_error());
    }

    /**
     * Return pretty json
     *
     * @param $contents
     * @return string
     */
    public static function decodePretty($contents)
    {
        return json_encode(json_decode($contents), JSON_PRETTY_PRINT);
    }

    protected static function exceptionClasses()
    {
        $exceptionClasses = [
            JSON_ERROR_DEPTH => MaximumStackDepthExceededException::class,
            JSON_ERROR_STATE_MISMATCH => InvalidOrMalformedJsonException::class,
            JSON_ERROR_CTRL_CHAR => ControlCharacterException::class,
            JSON_ERROR_SYNTAX => SyntaxErrorException::class,
        ];

        if (phpversion() >= '5.3.3') {
            $exceptionClasses = array_merge($exceptionClasses, [
                JSON_ERROR_UTF8 => MalformedUtf8CharactersException::class,
            ]);
        }
        if (phpversion() >= '5.5.0') {
            $exceptionClasses = array_merge($exceptionClasses, [
                JSON_ERROR_RECURSION => RecursiveReferencesException::class,
                JSON_ERROR_INF_OR_NAN => InfiniteNumberException::class,
                JSON_ERROR_UNSUPPORTED_TYPE => UnsupportedTypeException::class,
            ]);
        }

        if (phpversion() >= '7.0.0') {
            $exceptionClasses = array_merge($exceptionClasses, [
                JSON_ERROR_INVALID_PROPERTY_NAME => InvalidPropertyName::class,
                JSON_ERROR_UTF16 => MalformedUtf16CharactersException::class,
            ]);
        }

        return $exceptionClasses;
    }

    /**
     * Throw Exception based on Error Type
     *
     * @param $error
     */
    protected static function throwException($error)
    {
        if (array_key_exists($error, static::exceptionClasses())) {
            $class = static::exceptionClasses()[$error];
            throw new $class;
        }
    }
}