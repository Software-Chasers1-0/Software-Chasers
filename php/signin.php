<?php
namespace SoftwareChasers10\SoftwareChasers;
class signin {
    public function sign($user) {
        $servername = "localhost";
        $username = "user";
        $password = "password";
    
        $link = new \mysqli($servername,$username,$password,"database1");

        if ($link->connect_error) {
            die("connection failed: " . $link->connect_error);
        }
        if(is_null($user)) {
            $user = $_POST['Uname'];
        }
        //echo "now". $user. "thats ric";
        $result = mysqli_query($link,"SELECT * FROM users where user_name='$user'");
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
#echo (new signin())->sign(); 
?>
