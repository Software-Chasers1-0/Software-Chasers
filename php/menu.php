<?php
/*namespace SoftwareChasers10\SoftwareChasers;
class menu {
    public function download() {
        $servername = "localhost";
        $username = "rovhol0";
        $password = "Differ123*cpanel";
    
        $link = new \mysqli($servername,$username,$password,"rovhol0_database1");

        if ($link->connect_error) {
            die("connection failed: " . $link->connect_error);
        }
        //$book = $_POST['book'];
        $result = mysqli_query($link,"SELECT * FROM SubCategories");
    
        $link->close();
        #echo "connected successfully <br />";
        #echo json_encode($result);
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            #echo json_encode($result);
            array_push($arr, $row);
        }
        echo json_encode($arr);
    }
}
echo (new menu())->download();
?>
