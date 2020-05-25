<?php
/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\signup
 */
class signupTest extends PHPUnit\Framework\TestCase{
  protected $result;
  
  public function setUp() : void {//this part of the code initiates the hello variable
    $this->result = new \SoftwareChasers10\SoftwareChasers\signup();
    $link = mysqli_connect("localhost","username","password","rovhol0_database1");
    mysqli_query($link,"CREATE TABLE users (user_id int NOT NULL,user_name varchar(255),user_password varchar(255),user_email varchar(255),user_role varchar(255))");
	mysqli_query($link,"INSERT INTO users (user_id,user_name,user_password,user_role,user_email) values('46','Pfariso','Pfariso.@1','null','mpfumbapfariso@gmail.com')");
  }
  /**
   * @covers ::signin
   */
  public function testinit(){
    #$this->assertEquals($this->result->signup("","email","pass"),'invalid input');
    #$this->assertEquals($this->result->signup("user","","pass"),'invalid input');
    #$this->assertEquals($this->result->signup("user","email",""),'invalid input');
    #$this->assertEquals($this->result->signup("","",""),'invalid input');
    #$this->assertEquals($this->result->signup("Pfariso","email","Pfariso.@1"),'invalid email');
    #$this->assertTrue($this->result->signup("Pfariso","mpfumbapfariso@gmail.com","Pfariso.@1"));
    $this->assertTrue(count($this->result->signup("Pfariso","mpfumbapfariso@gmail.com","Pfariso.@1")) == 0);
  }
}
?>
