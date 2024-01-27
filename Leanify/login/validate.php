<?php
include "../php/config.php";
include "send.php";


if (isset($_POST["password"]) && isset($_POST["email"])) {
    $email = $_POST["email"];
    $sql = $conn->query("SELECT * FROM users WHERE email='$email' and status='activated'");
    if ($sql->num_rows > 0) {
        $password = $_POST['password'];
        $result = $sql->fetch_assoc();
        if (password_verify($password, $result['password'])) {
          $_SESSION["attempt"] = 0;
            if ($result['user_type'] == 1) {
              $_SESSION["user_id"]=$result['user_id'];
                echo json_encode(array("url" => "../Publisher/dashboard.php"));
                
            }else
            {
                echo json_encode(array("url" => "../index.php"));
                 
            }
        } else {
            $_SESSION["attempt"] = $_SESSION["attempt"] + 1;
            if ($_SESSION["attempt"] == 3) {
                send_email($email, 1);
            }
            echo json_encode(array("url" => "error"));
        }
    }
}
?>