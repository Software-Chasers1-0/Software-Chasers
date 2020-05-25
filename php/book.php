<?php
namespace SoftwareChasers10\SoftwareChasers;
class book {
    public function download($booksub,$bookid) {
        $servername = "localhost";
        $username = "user";
        $password = "password";
        //echo "something";
        $link = new \mysqli($servername,$username,$password,"database1");

        if ($link->connect_error) {
            die("connection failed: " . $link->connect_error);
        }
        //$booksub = $_POST['book_sub'];
        //$bookid = $_POST['book_id'];
        $result = mysqli_query($link,
            "SELECT SubCategories.subcategory_name,Categories.category_name,books.book_image,books.user_id FROM SubCategories,Categories,books
            WHERE SubCategories.subcategory_id = '$booksub' AND Categories.category_id = (
                SELECT SubCategories.category_id FROM SubCategories WHERE SubCategories.subcategory_id = '$booksub' LIMIT 1
            ) AND books.book_id = '$bookid'"
        );
        $link->close();
        //echo "something";
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arr, $row);
        }
        return json_encode($arr);
    }
}
//echo (new book)->download();
?>
