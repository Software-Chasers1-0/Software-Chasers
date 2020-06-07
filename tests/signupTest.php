<?php
/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\signup
 */
class signupTest extends PHPUnit\Framework\TestCase{
  protected $result;
  
  public function setUp() : void {//this part of the code initiates the hello variable
    $this->result = new \SoftwareChasers10\SoftwareChasers\signup();
    $link = mysqli_connect("localhost","user","password","database1");
    mysqli_query($link,"CREATE TABLE users (user_id int,user_name varchar(255),user_password varchar(255),user_email varchar(255),user_role varchar(255) NULL)");
    #mysqli_query($link,"INSERT INTO users (user_id,user_name,user_password,user_role,user_email) values('46','Pfariso','Pfariso.@1','null','mpfumbapfariso@gmail.com')");
  }
  /**
   * @covers ::sign
   */
  public function testsignup(){
    $this->assertEquals($this->result->sign("","email","pass"),'invalid input');
    $this->assertEquals($this->result->sign("user","","pass"),'invalid input');
    $this->assertEquals($this->result->sign("user","email",""),'invalid input');
    $this->assertEquals($this->result->sign("","",""),'invalid input');
   $this->assertTrue($this->result->sign("Pfariso","mpfumbapfariso@gmail.com","Pfariso.@1"));
  }
}
?>
