<?php
    $servername = "localhost";
    $username = "rovhol0";
    $password = "Differ123*cpanel";
    
    $link = new mysqli($servername,$username,$password,"rovhol0_database1");

    if ($link->connect_error) {
        die("connection failed: " . $link->connect_error);
    }
    $book = $_POST['book'];
    $result = mysqli_query($link,
        "SELECT * FROM books WHERE book_name LIKE '%$book%'
        OR subcategory_id IN (
            SELECT subcategory_id FROM SubCategories WHERE subcategory_name LIKE '%$book%'
            OR category_id IN (
                SELECT category_id FROM Categories WHERE category_name LIKE '%$book%'
            )
        ) ORDER BY book_id DESC;"
    );
    
    $link->close();
    #echo "connected successfully <br />";
    #echo json_encode($result);
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) 
    {
        #echo json_encode($result);
        array_push($arr, $row);
    }
    echo json_encode($arr);

?>