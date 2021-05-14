<?php 
    require("mysqli_connect.php");
    
    if(isset($_GET['delete'])){

        if(!isset($_SESSION)) {
            session_start();
        }
        $email = $_GET['delete'];

        $delete_user_sql = "delete from users where email='$email'";

        $db_connection->query($delete_user_sql) or die ($db_connection->error);
        
        $_SESSION['message'] = "User Deleted";
        $_SESSION['msg_type'] = "danger";
    }
?>