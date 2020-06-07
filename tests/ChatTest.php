<?php
//use PHPUnit\Framework\TestCase;
namespace PHPUnit\Framework;

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\chat
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
        $this->assertTrue($this->DataHolder->send_chat('46','61',"chat"));
    }
}
?>
