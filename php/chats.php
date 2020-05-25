<?php
namespace SoftwareChasers10\SoftwareChasers;
class chats {
    public function chat($buyer = NULL,$seller = NULL) {
        $servername = "localhost";
        $username = "user";
        $password = "password";
    
        $link = new \mysqli($servername,$username,$password,"database1");

        if ($link->connect_error) {
            die("connection failed: " . $link->connect_error);
        }
        #$buyer = $_POST['user'];
        #$seller = $_POST['seller'];
        #echo "something" . gettype($buyer);
        if(!is_null($seller)) {
            $result = mysqli_query($link,
                "INSERT INTO Chats (seller_id, buyer_id)
                SELECT * FROM (SELECT '$seller', '$buyer') AS tmp
                WHERE NOT EXISTS (
                    SELECT chat FROM Chats 
                    WHERE (seller_id = '$seller' And buyer_id = '$buyer')
                    OR (seller_id = '$buyer' And buyer_id = '$seller')
                ) LIMIT 1;"
            );
        }
        else {
            $result = mysqli_query($link,
                "SELECT Chats.*,buyer.user_name AS buyer_name,seller.user_name AS seller_name FROM Chats 
                LEFT JOIN users AS buyer ON buyer.user_id = Chats.buyer_id 
                LEFT JOIN users AS seller ON seller.user_id = Chats.seller_id
                WHERE Chats.buyer_id = '$buyer' OR Chats.seller_id = '$buyer' ORDER BY Chats.chat_id DESC;"
            );
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
//echo (new chats)->chat();
?>
