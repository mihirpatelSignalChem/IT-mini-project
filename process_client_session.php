<?php
//echo $_SESSION['username'];
    if(!isset($_SESSION)) { 
        session_start();
        if(session_status() == PHP_SESSION_ACTIVE){
        //echo "Session Active";
        
        if(!isset($_SESSION["logged_in"])){
            if($_SESSION["logged_in"] != "true"){
                header("Location:http://localhost/Practice/login.php");
            }
        }
        else{
            if($_SESSION["is_admin"] === "true"){
                header("Location:http://localhost/Practice/page_not_found.php");
            }
            else{
                echo $_SESSION["username"];
            }
        }
        }
        //if session not active
        else{
        header("Location:http://localhost/Practice/login.php");
        }
    }

?>