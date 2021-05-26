<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="home.php">Navbar</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="add_item.php">Add Product</a>
            </li>
          </ul>
          <h5 class= "my-2 mr-sm-2 text-light">
            <?php include "process_client_session.php"; ?>
              </h5>
          <form class="form-inline my-2 my-lg-0" action="logout.php" method="POST">
            
            <button class="btn btn-light btn-outline-danger  my-2 my-sm-0" type="submit">Log out</button>
          </form>
        </div>
      </nav>
    <?php
        require("mysqli_connect.php");
        if(!isset($_SESSION)) {
            session_start();
        }
        if(isset($_POST['add'])){
            
            $product_id = null;
            $name = $_POST['name'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

           
            $add_product_sql = "insert into products (name, type, price, quantity) values ('$name', '$type', '$price', '$quantity')";
            //$db_connection->query($add_product_sql) or die ($db_connection->error);

            if($db_connection -> query($add_product_sql)){
              //echo "Product Added";
              $_SESSION['message'] = "Product Added";
              $_SESSION['msg_type'] = "success";
              header("Location:http://localhost/Practice Pagination/IT-mini-project/home.php");
            }
            else{
              
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }    
    ?>
    
    <div class="container mt-3">
        <form action="add_item.php" method="POST" >
            <div class="form-group text-center">
                <label > <h3><b>Add Product </b></h3></label>
            </div>
             <!-- <div class="form-group">
                <label for="product_id">Product Id:</label>
                <input type="text" class="form-control"  id="add_product_id" name="product_id" required>
            </div> -->
            <div class="form-group">
                <label for="add_name">Product Name:</label>
                <input type="text" class="form-control" id="add_name" name="name" required>
            </div>
            <div class="form-group">
                <label for="">Product Type:</label>
                <input type="text" class="form-control" id="add_type" name="type" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="add_price" name="price" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" id="add_quantity" name="quantity" required>
            </div>

            <button type="submit" class="btn btn-primary" name="add">Add Item</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>






