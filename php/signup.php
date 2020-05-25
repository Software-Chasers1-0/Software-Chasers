<?php
namespace SoftwareChasers10\SoftwareChasers;
class signup {
    public function sign($user = NULL,$mail = NULL,$pass = NULL) {
        $servername = "localhost";
        $username = "user";
        $password = "password";
        //echo "connected successfully <br />";
        $link = new \mysqli($servername,$username,$password,"database1");

        if ($link->connect_error) {
            die("connection failed: " . $link->connect_error);
        }
        #$user = $_POST['Uname'];
        #$mail = $_POST['Umail'];
        #$pass = $_POST['passwd'];
        if($user = "" || $mail = ""  || $pass = "") {
            return 'invalid input';
        }
    
        #echo "now". $user. "thats ric";
        $result = mysqli_query( $link,"INSERT INTO users(user_name, user_email, user_password) VALUES('$user', '$mail', '$pass')" );
        $link->close();
        return $result;
    }
}
#echo (new signup())->sign();
?>
