<?php
//use PHPUnit\Framework\TestCase;
namespace PHPUnit\Framework;

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\chats
 */
class ChatTest extends TestCase{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\chat();
   
    }
   /**
   * @covers ::send_chat
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty($this->DataHolder, "It is empty");
    }
}
?>