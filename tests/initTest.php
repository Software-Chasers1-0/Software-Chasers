<?php
/**
 * @coversDefaultClass \Software-Chasers1-0\Software-Chasers\init
 */
class initTest extends PHPUnit_Framework_TestCase{
  protected $hello;
  
  public function setUp(){//this part of the code initiates the hello variable
    $this->hello = new \`Software-Chasers1-0`\Software-Chasers\init();
  }
  /**
   * @covers ::world
   */
  public function testinit(){//this part of the code checks if the value returned by the world() method is equal to word
    $this->assertSame('world',$this->hello->world());
  }
}
?>
