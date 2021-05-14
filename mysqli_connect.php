<?php
    $servername = "localhost";
    $username = "root";
    $password = "mihirpatel";
    $dbname = "inventory";

    $db_connection = new mysqli( $servername, $username, $password, $dbname);
    //$db_connection = mysqli_connect($servername, $username, $password, $dbname);

    /*if(!$db_connection){
        die("Connection failed" . mysqli_connect_error());
    }
    else{
        echo "Connected Successfully";
    }*/
    if($db_connection->connect_error){
        die("Connection failed" . $db_connection->connect_error);
    }
    else{
        return "Connected Successfully";
    }

?>