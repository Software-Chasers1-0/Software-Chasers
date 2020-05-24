<?php
use PHPUnit\Framework\TestCase;

class EmptyTest extends TestCase
{
    public function testFailure()
    {
        $this->assertNotEmpty([json_encode($arr)]);
    }
}
