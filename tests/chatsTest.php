<?php
use PHPUnit\Framework\TestCase;
/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\chats
 */
class EmptyTest extends TestCase
{
    
   /**
   * @covers ::chat
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty([json_encode($arr)]);
    }
}
