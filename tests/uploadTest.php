<?php


/**
 * @coversDefaultClass \SoftwareChasers10\SoftwareChasers\upload
 */
class uploadTest extends PHPUnit\Framework\TestCase{
    protected $DataHolder;
  
    public function setUp(): void {
    $this->DataHolder = new \SoftwareChasers10\SoftwareChasers\upload();
    $link = mysqli_connect("localhost","user","password","database1");
    mysqli_query($link,"CREATE TABLE Categories (category_id int,category_name varchar(255))");
    mysqli_query($link,"INSERT INTO Categories (category_id,category_name) values('14','Science')");
    mysqli_query($link,"CREATE TABLE SubCategories (subcategory_id int,subcategory_name varchar(255),category_id int)");
    mysqli_query($link,"INSERT INTO SubCategories (subcategory_id,subcategory_name,category_id) values('14','BSC','14')");
    mysqli_query($link,"CREATE TABLE books (book_id int,book_name varchar(255),book_author varchar(255),book_isbn varchar(11),book_price float(11),subcategory_id int,user_id int, book_image varchar(255))");
    mysqli_query($link,"INSERT INTO books (book_id,book_name,book_author,book_isbn,book_price,subcategory_id,user_id,book_image) VALUES('14','bookname','author','123456','55.5','14','14','img')");
   
    }
   /**
   * @covers ::upload
   */
    public function test_if_Empty()
    {
        $this->assertFalse($this->DataHolder->sell('bookname','author','55.5','123456','Science','BSC','14','img'));
    }

}
?>
