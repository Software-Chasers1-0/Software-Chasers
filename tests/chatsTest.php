<?php
//use PHPUnit\Framework\TestCase;
namespace PHPUnit\Framework;

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\chats
 */
class chatsTest extends TestCase{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\chats();
   // $this->DataHolder ="OKAY";
    }
   /**
   * @covers ::chat
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty($this->DataHolder, "It is empty");
    }
}
?>
