<?php
namespace SoftwareChasers10\SoftwareChasers;
class chat {
    public function send_chat($buyer,$seller,$chat) {
        $servername = "localhost";
        $username = "user";
        $password = "password";
        //echo "something";
        $link = new \mysqli($servername,$username,$password,"database1");

        if ($link->connect_error) {
            die("connection failed: " . $link->connect_error);
        }
        #$buyer = $_POST['user'];
        #$seller = $_POST['seller'];
        #$chat = $_POST['chat'];
        echo $chat;
        $result = mysqli_query($link,
            "UPDATE Chats SET chat = '$chat' 
            WHERE (seller_id = '$seller' And buyer_id = '$buyer')
            OR (seller_id = '$buyer' And buyer_id = '$seller')"
        );
        
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
//echo (new chat)->send_chat();
?>
