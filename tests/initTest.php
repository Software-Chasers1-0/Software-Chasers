<?php
use PHPUnit\Framework\TestCase;
/**
 * @coversDefaultClass \Software-Chasers1\Software-Chasers\init
 */
class initTest extends PHPUnit\Framework\TestCase{
  protected $hello;
  
  public function setUp(): void {//this part of the code initiates the hello variable
    $this->hello = new \Software-Chasers1\Software-Chasers\init();
  }
  /**
   * @covers ::world
   */
  public function testinit(){//this part of the code checks if the value returned by the world() method is equal to word
    $this->assertSame('world',$this->hello->world());
  }
}
?>
