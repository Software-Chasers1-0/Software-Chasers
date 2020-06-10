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
    mysqli_query($link,"CREATE TABLE users (user_id int,user_name varchar(255),user_password varchar(255),user_email varchar(255))");
    mysqli_query($link,"INSERT INTO users (user_id,user_name,user_password,user_email) values('46','Pfariso','Pfariso.@1','mpfumbapfariso@gmail.com')");
    mysqli_query($link,"INSERT INTO users (user_id,user_name,user_password,user_email) values('61','Pfariso','Pfariso.@1','mpfumbapfariso@gmail.com')");
    }
   /**
   * @covers ::chat
   */
    public function test_if_Empty()
    {
        $this->assertTrue($this->DataHolder->chat('46','61'));
        $this->assertTrue($this->DataHolder->chat("46','NULL'));
    }
}
?>
