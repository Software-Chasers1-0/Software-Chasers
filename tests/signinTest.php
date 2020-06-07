<?php

namespace PHPUnit\Framework;

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\signin
 */
class signinTest extends TestCase{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\signin();
    $link = mysqli_connect("localhost","user","password","database1");
    mysqli_query($link,"CREATE TABLE users (user_id int,user_name varchar(255),user_password varchar(255),user_email varchar(255))");
    mysqli_query($link,"INSERT INTO users (user_id,user_name,user_password,user_email) values('46','Pfariso','Pfariso.@1','mpfumbapfariso@gmail.com')");
    }
   /**
   * @covers ::sign
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty(\json_decode($this->DataHolder->sign('Pfariso')));
    }
    
    public function login()
    {
        $user = User::first();
        $this->be($user);
        
    }

}
?>
