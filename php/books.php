<?php
namespace SoftwareChasers10\SoftwareChasers;
class books {
    public function download($id = NULL,$book = NULL) {
        $servername = "localhost";
        $username = "user";
        $password = "password";
    
        $link = new \mysqli($servername,$username,$password,"database1");

        if ($link->connect_error) {
            die("connection failed: " . $link->connect_error);
        }
        #$book = $_POST['book'];
        #$id = $_POST['id'];
        if(is_null($id)) {
            $result = mysqli_query($link,
                "SELECT * FROM books WHERE book_name LIKE '%$book%'
                OR book_author LIKE '%$book%'
                OR subcategory_id IN (
                    SELECT subcategory_id FROM SubCategories WHERE subcategory_name LIKE '%$book%'
                    OR category_id IN (
                        SELECT category_id FROM Categories WHERE category_name LIKE '%$book%'
                    )
                ) ORDER BY book_id DESC;"
            );
        }
        else {
            $result = mysqli_query($link,"SELECT * FROM books WHERE user_id = '$id'");
        }
        
    
        $link->close();
        #echo "connected successfully <br />";
        #echo json_encode($result);
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            #echo json_encode($result);
            array_push($arr, $row);
        }
        return json_encode($arr);
    }
}
#echo (new books)->download();
?>
