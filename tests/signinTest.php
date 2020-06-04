<?php

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\signin
 */
class signinTest extends PHPUnit\Framework\TestCase
{
    protected $DataHolder;
  
    public function setUp(): void 
    {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\php\signin;
    $link = mysqli_connect("localhost","user","password","database1");
    mysqli_query($link,"CREATE TABLE users (user_id int,user_name varchar(255),user_password varchar(255),user_email varchar(255),,user_role varchar(255) NULL)");
   
    }
   /**
   * @covers ::sign
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty($this->DataHolder, "It is empty");
    }
}
?>
