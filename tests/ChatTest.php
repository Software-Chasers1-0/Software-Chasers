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
    $link = mysqli_connect("localhost","user","password","database1");
    mysqli_query($link,"CREATE TABLE Chats (seller_id int,chat varchar(255),buyer_id int)");
    mysqli_query($link,"INSERT INTO Chats (seller_id,chat,buyer_id) VALUES('46','null','61')");
   
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
