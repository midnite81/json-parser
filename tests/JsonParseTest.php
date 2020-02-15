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
     * @expectedException Midnite81\JsonParser\Exceptions\JsonException
     */
    public function it_throws_an_error_when_encoding()
    {
        $array = [
            'message' => 999999999999999999999999999999999999 * 999999999999999999999999999999999999 *
                        999999999999999999999999999999999999 * 999999999999999999999999999999999999 *
                        999999999999999999999999999999999999 * 999999999999999999999999999999999999 *
                        999999999999999999999999999999999999 * 999999999999999999999999999999999999 *
                        999999999999999999999999999999999999 * 999999999999999999999999999999999999 *
                        999999999999999999999999999999999999 * 999999999999999999999999999999999999 *
                        999999999999999999999999999999999999 * 999999999999999999999999999999999999 *
                        999999999999999999999999999999999999 * 999999999999999999999999999999999999
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
     */
    public function it_can_pretify_json()
    {
        $jsonString = '{"message":"Hello World"}';

        $result = JsonParse::decodePretty($jsonString);

        echo $result;

        $expected = "{\n    \"message\": \"Hello World\"\n}";

        $this->assertInternalType('string', $result);
        $this->assertEquals($expected, $result);
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