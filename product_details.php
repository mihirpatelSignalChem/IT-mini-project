<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center bg-primary text-white p-3">Product Details Page</h1>
    <div class = "container">
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
                    //echo $_SESSION["username"];
                }
            }
            }
            //if session not active
            else{
            header("Location:http://localhost/Practice/login.php");
            }
        }
        require("mysqli_connect.php");
        if(isset($_GET['fetch'])){
            //echo "php script";
            
            $product_id = $_GET['fetch'];
            //echo $product_id;

             $fetch_product_details_sql = "select * from product_details where product_id = $product_id";
            
             $response = $db_connection->query($fetch_product_details_sql);

            //if there are items in products table
            if($response->num_rows > 0)
            {?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                <?php while($row = mysqli_fetch_array($response)){?>
                
                    <tbody>
                        <tr>
                        <td> <?php echo $row['product_id']?></td>
                        <td> <?php echo $row['date'] ?> </td>
                        <td> <?php echo $row['quantity'] ?> </td>
                        </tr>
                    </tbody>
                
                <?php
                }?>
              </table>   
            <?php }
            else{?>
                <div class="alert alert-danger"> No Records exist</div>
            <?php }

        }
        ?>
    </div>
             
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>