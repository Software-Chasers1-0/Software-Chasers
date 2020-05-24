<?php
/*namespace SoftwareChasers10\SoftwareChasers;
class upload {
    public function sell() {
        
        $bookname = $_POST['bookname'];
        $author = $_POST['author'];
        $price = $_POST['price'];
        $isbn = $_POST['isbn'];
        $faculty = $_POST['faculty'];
        $school = $_POST['school'];
        $user = $_POST['user'];
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];
        $fileContent = file_get_contents($_FILES['file']['tmp_name']);
        $data = base64_encode($fileContent);
        $dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
        
        $link = new \mysqli("localhost","rovhol0","Differ123*cpanel","rovhol0_database1");
        
        if ($link->connect_error) {
            die("connection failed: " . $link->connect_error);
        }
        //echo "connected successfully <br />";
        /*$json = json_encode(array(
            'name' => $fileName,
            'type' => $fileType,
            'dataUrl' => $dataUrl,
            'username' => $faculty,
            'accountnum' => $school
        ));*/
        //echo $json;
        //echo "<br />something " . price;
        #echo "now". $user. "thats ric";
        //echo "3.5";
        $result = mysqli_query($link,
            "INSERT INTO books (book_isbn, book_name, book_author, book_price, book_image, user_id) 
            VALUES ('$isbn','$bookname', '$author', '$price', '$dataUrl','$user')");
        if($result != false) {
            mysqli_query($link,"INSERT IGNORE INTO SubCategories (category_id, subcategory_name) 
                VALUES (0,'$school')");
            mysqli_query($link,"UPDATE SubCategories SET category_id =
                (SELECT category_id FROM Categories WHERE category_name = '$faculty') WHERE category_id = '0';");
            mysqli_query($link,"UPDATE books SET subcategory_id =
                (SELECT subcategory_id FROM SubCategories WHERE subcategory_name = '$school') WHERE subcategory_id = '0'");
        }
        
        $link->close();
        #echo "connected successfully <br />";
        //echo json_encode($result);
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            #echo json_encode($result);
            array_push($arr, $row);
        }
        
        return json_encode($arr);
        
    }
}
echo (new upload())->sell();
?>
