<?php
use PHPUnit\Framework\TestCase;
/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\chats
 */
class ChatsTests extends TestCase
{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\chats;
   // $this->DataHolder ="OKAY";
    }
   /**
   * @covers ::chat
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty($this->DataHolder);
    }
}
?>
