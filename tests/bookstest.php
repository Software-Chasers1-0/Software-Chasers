<?php

namespace PHPUnit\Framework;

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\books
 */
class bookstest extends TestCase{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\books();
   
    }
   /**
   * @covers ::download
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty($this->DataHolder, "It is empty");
    }
}
?>
