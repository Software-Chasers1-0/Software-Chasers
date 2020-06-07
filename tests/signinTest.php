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
    mysqli_query($link,"INSERT INTO users (user_id,user_name,user_password,user_role,user_email) values('46','Pfariso','Pfariso.@1','null','mpfumbapfariso@gmail.com')");
    }
   /**
   * @covers ::sign
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty($this->DataHolder->sign('Pfariso'));
    }
    
    public function login()
    {
        $user = User::first();
        $this->be($user);
        
    }

}
?>
