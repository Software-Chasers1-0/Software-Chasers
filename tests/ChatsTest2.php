
<?php
/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\chats
 */
class chatsTest2 extends PHPUnit_Framework_TestCase{
  protected $result;
  
  public function setUp(){//this part of the code initiates the hello variable
    $this->result = new \SoftwareChasers10\SoftwareChasers\chats();
    $link = mysqli_connect(("localhost","username","password","rovhol0_database1");
    mysqli_query($link,"CREATE TABLE Chats (chat_id int(11) NOT NULL,seller_id int(11)NOT NULL,chat text(255),buyer_id int(11) NOT NULL)");
    mysqli_query($link,"INSERT INTO Chats (chat_id,seller_id,chat,buyer_id) values('1','15','hello how you doing','14')");
  }
  /**
   * @covers ::Chats
   */
  public function testinit(){//this part of the code checks if the value returned by the world() method is equal to word
    $this->assertTrue( $this->result->Chats() != null);
  }
}
?>
