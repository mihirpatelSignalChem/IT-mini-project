<?php 
    require("mysqli_connect.php");
    include "process_client_session.php";
    
    if(isset($_GET['delete'])){
        if(!isset($_SESSION)) {
            session_start();
        }
        $product_id = $_GET['delete'];
        $number = $product_id;

        $delete_product_sql = "delete from products where product_id = $product_id";
        $delete_product_details = "delete from product_details where product_id='$product_id'";
        $decrease_product_id = "alter table products AUTO_INCREMENT = $number";

        $db_connection->query($delete_product_sql) or die ($db_connection->error);

        $db_connection->query($delete_product_details) or die($db_connection->error);

        $db_connection->query($decrease_product_id) or die($db_connection->error);

        $_SESSION['message'] = "Product Deleted";
        $_SESSION['msg_type'] = "danger";
    }
?>