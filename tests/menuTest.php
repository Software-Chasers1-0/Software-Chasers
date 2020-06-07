<?php

namespace PHPUnit\Framework;

/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\menu
 */
class menuTest extends TestCase{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\menu();
    $link = mysqli_connect("localhost","user","password","database1");
    mysqli_query($link,"CREATE TABLE SubCategories (subcategory_id int,subcategory_name varchar(255),category_id int)");
    mysqli_query($link,"INSERT INTO SubCategories (subcategory_id,subcategory_name,category_id) values('46','BSC','1')");
   
    }
   /**
   * @covers ::download
   */
    public function test_if_Empty()
    {
        $this->assertNotEmpty(\json_decode($this->DataHolder->download()));
    }
}
?>
