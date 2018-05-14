<?php

namespace Midnite81\JsonParser\Tests;

use Midnite81\JsonParser\JsonParse;
use PHPUnit\Framework\TestCase;

class JsonParseTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_encode_valid_json()
    {
        $array = [
            'message' => 'hello world'
        ];

        $json = JsonParse::encode($array);

        $this->assertJson($json);
    }

    /**
     * @test
     */
    public function it_can_decode_valid_json_as_object()
    {
        $jsonString = '{"message":"Hello World"}';

        $decoded = JsonParse::decode($jsonString);

        $this->assertInternalType('object', $decoded);
        $this->assertObjectHasAttribute('message', $decoded);
    }

    /**
     * @test
     */
    public function it_can_decode_valid_json_as_array()
    {
        $jsonString = '{"message":"Hello World"}';

        $decoded = JsonParse::decode($jsonString, true);

        $this->assertInternalType('array', $decoded);
        $this->assertArrayHasKey('message', $decoded);
    }

    /**
     * @test
     * @expectedException Midnite81\JsonParser\Exceptions\JsonException
     */
    public function it_can_throw_generic_error_on_decode()
    {
        $jsonString = '{"message":"Hello ';

        JsonParse::decode($jsonString, true);
    }

}