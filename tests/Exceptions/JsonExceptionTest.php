<?php

namespace Midnite81\JsonParser\Tests\Exceptions;

use Midnite81\JsonParser\Exceptions\MaximumStackDepthExceededException;
use PHPUnit\Framework\TestCase;

class JsonExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_get_json_error_message()
    {
        $exception = new MaximumStackDepthExceededException();

        $msg = $exception->getJsonErrorMessage();

        $this->assertInternalType('string', $msg);
        $this->assertEquals('JSON_ERROR_DEPTH The maximum stack depth has been exceeded', $msg);
    }
}