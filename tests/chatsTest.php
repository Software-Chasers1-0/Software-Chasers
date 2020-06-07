<?php

namespace PHPUnit\Framework;

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\chats
 */
class chatsTest extends TestCase{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\chats();
    $link = mysqli_connect("localhost","user","password","database1");
    mysqli_query($link,"CREATE TABLE Chats (seller_id int,chat varchar(255),buyer_id int)");
    }
   /**
   * @covers ::chat
   */
    public function test_if_Empty()
    {
        $this->assertTrue($this->DataHolder->chat('46','61'));
        #$this->assertNotEmpty($this->DataHolder->chat('46'));
    }
}
?>
