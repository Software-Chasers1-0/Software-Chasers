
<?php
use PHPUnit\Framework\TestCase;
/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\chats
 */
class EmptyTest extends TestCase
{
    $this->$DataHolder = new \SoftwareChasers10\SoftwareChasers\chats();
   /**
   * @covers ::chat
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty($DataHolder);
    }
}