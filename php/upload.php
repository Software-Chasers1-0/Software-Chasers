<?php
    $servername = "localhost";
    $username = "rovhol0";
    $password = "Differ123*cpanel";
    
    $link = new mysqli($servername,$username,$password,"rovhol0_database1");

    if ($link->connect_error) {
        die("connection failed: " . $link->connect_error);
    }
    //echo "connected successfully <br />";
    $bookname = $_POST['bookname'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $isbn = $_POST['isbn'];
    $faculty = $_POST['faculty'];
    $school = $_POST['school'];
    
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $fileContent = file_get_contents($_FILES['file']['tmp_name']);
    $data = base64_encode($fileContent);
    $dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
    $json = json_encode(array(
        'name' => $fileName,
        'type' => $fileType,
        'dataUrl' => $dataUrl,
        'username' => $_REQUEST['username'],
        'accountnum' => $_REQUEST['accountnum']
    ));
    //echo $json;
    //echo "<br />something " . price;
    #echo "now". $user. "thats ric";
    $result = mysqli_query($link,
        "INSERT INTO books (book_isbn, book_name, book_author, book_price, book_image, user_id) 
        VALUES ('$isbn','$bookname', '$author', '$price', '$dataUrl','2')");
    if($result != false) {
        mysqli_query($link,"INSERT IGNORE INTO SubCategories (category_id, subcategory_name) 
            VALUES ((SELECT category_id FROM Categories WHERE category_name = '$faculty'),'$school')");
        mysqli_query($link,"UPDATE books SET subcategory_id =
            (SELECT subcategory_id FROM SubCategories WHERE subcategory_name = '$school') WHERE subcategory_id = '0'");
    }
        
    $link->close();
    #echo "connected successfully <br />";
    //echo json_encode($result);
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) 
    {
        #echo json_encode($result);
        array_push($arr, $row);
    }
    echo json_encode($arr);
?>