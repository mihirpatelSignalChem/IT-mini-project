<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-1">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="home.php">Navbar</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php
                if(!isset($_SESSION)) { 
                    session_start(); 
                }
                //session active
                if(isset($_SESSION["logged_in"])){
                  ?>  <li class="nav-item">
                      <a class="nav-link" href="add_item.php"> Add Product</a>
                    </li>
                <?php }
                else{
                   }
            ?>
          </ul>
          <h5 class= "my-2 mr-sm-2 text-light">
            <?php 
            
                //session active
                if(isset($_SESSION["logged_in"])){
                      //admin
                      if($_SESSION['is_admin'] === "true"){
                          header("Location:http://localhost/Practice/page_not_found.php");
                      }
                      //user
                      else{
                          echo $_SESSION["username"];
                      ?>    </h5>
                          <form class="form-inline my-2 my-lg-0" action="logout.php" method="POST">
                                <button class="btn btn-light btn-outline-danger  my-2 my-sm-0" type="submit">Log out</button>
                          </form>
                <?php }
                }
                //session not active
                else{
                    ?>  </h5>
                    <form class="form-inline my-2 my-lg-0" action="login.php" method="POST">
                          <button class="btn btn-light btn-outline-danger  my-2 my-sm-0" type="submit">Log In</button>
                    </form>
                  
            <?php }
            ?>
              <!-- </h5>
          <form class="form-inline my-2 my-lg-0" action="logout.php" method="POST">
            
            <button class="btn btn-light btn-outline-danger  my-2 my-sm-0" type="submit">Log out</button>
          </form> -->
        </div>
      </nav>
    

    <?php require_once "delete_product.php";?>
    <?php if(!isset($_SESSION)) { 
        session_start(); 
    }?>
    <?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php   echo $_SESSION['message'];
                unset($_SESSION['message']); 
                unset($_SESSION['msg_type']);
            ?>
    </div>
    <?php endif ?>
    

    <div class="container">   
      <?php
          require("mysqli_connect.php");
          $fetch_products_sql = "select * from products";

          $response = mysqli_query($db_connection, $fetch_products_sql);

          //if there are items in products table
          if($response)
          {
              //print $result -> fetch_assoc();
      ?>
      <div class="container text-center">
          <h1 class="text-center bg-primary text-white p-3">Products</h1>
      </div>

      <div class="container text-center">
          
          <table class="table table-striped">
              <thead>
                  <tr>
                  <th scope="col">Product Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">type</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Delete</th>
                  </tr>
              </thead>
            <?php 
                while($row = mysqli_fetch_array($response)){ 
                    //echo "<tr> <td>  {$row['student_id']}  </td>  <td>  {$row['name']}  </td>  <td>  {$row['branch']}  </td> </tr>";
            ?>
              <tbody>
                    <tr>
                    <td> <a href = "product_details.php?fetch=<?php echo $row['product_id']; ?>"> <?php echo $row['product_id']; ?> </td>
                    <td> <?php echo $row['name'] ?></td>
                    <td> <?php echo $row['type'] ?> </td>
                    <td> <?php echo $row['price'] ?> </td>
                    <td> <?php echo $row['quantity'] ?> </td>
                    <td> <a href = "home.php?delete=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</td>
                    </tr>
                </tbody>
          <?php }
            echo "</table>"; 
          }     
          //if there are no products in items table
          else{
                echo "Query not executed";
                echo mysqli_error($db_connection);
          }

          mysqli_close($db_connection);?>
      </div>  
    </div>
    
      


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>