<?php

    if(isset($_POST["register"])){

        $email = $_POST["email"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $time = date("Y-m-d H:i:s"); 

        //echo $email . " " . $first_name . " " . $last_name . " " . $password;
        //if passwords do not match
        if($password1 != $password2){ ?>
            <div class="alert alert-danger"> Passwords do not match </div>
        <?php }
        
        else{
            require("mysqli_connect.php");

            $check_user_sql = "SELECT * FROM users WHERE email = '$email'";
            $response = $db_connection->query($check_user_sql);
            //$response = mysqli_query($db_connection, "SELECT * FROM users WHERE email = '$email'");

            if($response->num_rows > 0){ ?>
                <div class="alert alert-danger"> User already Exists </div>
            <?php }
            else{
                session_start();
                //$_SESSION['message'] = "User Added Successfully"; 
                if(isset($_POST["is_admin"]) && $_POST["is_admin"]==="true"){
                    
                    $is_admin = $_POST["is_admin"];
                    $is_activated = "true";
                    $password = password_hash($password1, PASSWORD_BCRYPT);
                    $add_user_sql = "insert into users (email, password, first_name, last_name, time, is_admin, is_activated) values ('$email', '$password', '$first_name', '$last_name', '$time', '$is_admin', '$is_activated')";
                    //$add_user_sql = "insert into users (email, password, first_name, last_name) values (?,?,?,?)";
                    //$stmt = mysqli_prepare($db_connection, $add_user_sql);
                    //mysqli_stmt_bind_param($stmt, "ssss", $email, $password, $first_name, $last_name);
                    //mysqli_stmt_execute($stmt);

                    $db_connection->query($add_user_sql) or die ($db_connection->error);
                }
                else{
                    $is_admin = "false";
                    $is_activated = "true";
                    $password = password_hash($password1, PASSWORD_BCRYPT);
                    $add_user_sql = "insert into users (email, password, first_name, last_name, time, is_admin, is_activated) values ('$email', '$password', '$first_name', '$last_name', '$time', '$is_admin', '$is_activated')";
                    //$add_user_sql = "insert into users (email, password, first_name, last_name) values (?,?,?,?)";
                    //$stmt = mysqli_prepare($db_connection, $add_user_sql);
                    //mysqli_stmt_bind_param($stmt, "ssss", $email, $password, $first_name, $last_name);
                    //mysqli_stmt_execute($stmt);

                    $db_connection->query($add_user_sql) or die ($db_connection->error);
                }
                
                $_SESSION['message'] = "User Registered.";
                $_SESSION['msg_type'] = "success";



                header("Location:http://localhost/Practice/login.php");
            }

        }
    }
?>