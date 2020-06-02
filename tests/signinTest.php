<?php

namespace PHPUnit\Framework;

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\signin
 */
class signinTest extends TestCase{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\signin();
   
    }
   /**
   * @covers ::sign
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty($this->DataHolder->signin(), "It is empty");
    }
}
?>
