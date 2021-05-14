<?php
    if(isset($_POST['login'])){
        require("mysqli_connect.php");
        //echo "process login";
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check_user_sql = "SELECT * FROM users WHERE email = '$email'";
        $response = $db_connection->query($check_user_sql);

        if($response->num_rows === 0){ ?>
            <div class="alert alert-danger">User is not Registered. Please Register first.</div>
        <?php }
        else{
            //echo "User exists";
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            //echo "password hash:" . $password_hash;
            //print("\n");
            // $match_password_sql = "SELECT * FROM users WHERE password = '$password_hash'";
            // $response = $db_connection->query($match_password_sql);

            while($row = $response->fetch_assoc()){
                // echo "email:" . $row["email"] . " password:" . $row["password"];
                // echo "<br>";
                
                if(password_verify($password, $row["password"])) {

                    if($row["is_activated"] === "true"){
                        if($row["is_admin"] === "false"){
                            //echo 'Password is valid!';
                            //create session
                            if(!isset($_SESSION)) {
                                session_start(); 
                            }
                            
                            $_SESSION["username"] = $row["first_name"];
                            echo $_SESSION["username"];
                            echo "<br>";
                            echo $_SESSION["logged_in"];
                            $_SESSION["logged_in"] = "true";
                            //to check whether 
                            $_SESSION["is_admin"] = "false";
                            header("Location:home.php");
                            //exit;
                        }
                        if($row["is_admin"] === "true"){
                            //create session
                            if(!isset($_SESSION)) {
                                session_start();
                            }
                            $_SESSION["username"] = $row["first_name"];
                            echo $_SESSION["username"];
                            echo "<br>";
                            echo $_SESSION["logged_in"];
                            $_SESSION["logged_in"] = "true";
                            $_SESSION["is_admin"] = "true";
                            header("Location:admin_home.php");
                        }
                    }
                    //user is not deactivated
                    else{ ?>
                        <div class="alert alert-danger">User Deactivated. Please Contact Admin.</div>
                    <?php }
                } 

                else { ?>
                    <div class="alert alert-danger">Enter Valid Password</div>
                <?php }
            }
        }

    }
?>