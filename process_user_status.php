<?php

    require("mysqli_connect.php");

    if(isset($_GET['status_change'])){
        if(!isset($_SESSION)) {
            session_start();
        }

        $change = $_GET['status_change'];
        $email = $_GET['email'];
        //echo "change=$change"." ". "email=$email";

        $status_change_sql = "update users set is_activated='$change' where email= '$email'";

        $db_connection->query($status_change_sql) or die ($db_connection->error);

        $_SESSION['message'] = "Status Updated";
        $_SESSION['msg_type'] = "success";
    }
?>