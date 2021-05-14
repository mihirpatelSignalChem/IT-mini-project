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
     
    <div >
        <h1 class="text-center bg-primary text-white p-3">Home Page</h1>
    </div>

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
        <div class="container-fluid text-center">
            <label> <h3> Products </h3></label>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    </tr>
                </thead>

            <?php 
                while($row = mysqli_fetch_array($response)){ 
                    //echo "<tr> <td>  {$row['student_id']}  </td>  <td>  {$row['name']}  </td>  <td>  {$row['branch']}  </td> </tr>";
                ?>
                
                <tbody>
                    <tr>
                    <td> <?php echo $row['product_id'] ?></td>
                    <td> <?php echo $row['name'] ?></td>
                    <td> <?php echo $row['type'] ?> </td>
                    <td> <?php echo $row['price'] ?> </td>
                    <td> <?php echo $row['quantity'] ?> </td>
                    </tr>
                </tbody>
                <?php} 
            echo "</table> </div>";

            }
        
            //if there are no products in items table
            else{
                echo "Query not executed";
                echo mysqli_error($db_connection);
            }

            //mysqli_close($db_connection);
            ?>
        </div>
    </div>
        <div class="container">
            <div class="container-fluid mb-5">
                <div class="row">
                    <!-- container for adding products-->
                    <div class="col-sm-4 col-md-4 col-lg-4 p-3">
                        
                        <form action="add_item.php" method="POST" >
                        <div class="form-group text-center" >
                            <label> <h3><b>Add Product </b></h3></label>
                        </div>
                        <div class="form-group">
                            <label for="product_id">Product Id:</label>
                            <input type="text" class="form-control"  id="add_product_id" name="product_id" >
                        </div>
                        <div class="form-group">
                            <label for="add_name">Product Name:</label>
                            <input type="text" class="form-control" id="add_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Product Type:</label>
                            <input type="text" class="form-control" id="add_type" name="type">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="add_price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" id="add_quantity" name="quantity">
                        </div>

                        <button type="submit" class="btn btn-primary" name="add">Add Item</button>
                        </form>

                    </div>

                    <!-- container for editing products-->
                    <div class="col-sm-4 col-md-4 col-lg-4 p-3">
                        <form action="index.php">
                            <div class="form-group text-center">
                                <label> <h3><b>Edit Product </b></h3></label>
                            </div>
                            <div class="form-group">
                                <label for="product_id">Product Id:</label>
                                <input type="text" class="form-control"  id="edit_product_id" name="product_id" >
                            </div>
                            <div class="form-group">
                                <label for="add_name">Product Name:</label>
                                <input type="text" class="form-control" id="edit_name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Product Type:</label>
                                <input type="text" class="form-control" id="edit_type" name="type">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="edit_price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" id="add_quantity" name="quantity">
                            </div>

                            <button type="submit" class="btn btn-primary" name="edit">Edit Item</button>
                        </form>
                    </div>
                    <!-- container for deleting products-->
                    <div class="col-sm-4 col-md-4 col-lg-4 p-3">
                        <form action="index.php">
                            <div class="form-group text-center">
                                <label> <h3><b>Delete Product </b></h3></label>
                            </div>
                            <div class="form-group">
                                <label for="product_id">Product Id:</label>
                                <input type="text" class="form-control"  id="edit_product_id" name="product_id" >
                            </div>

                            <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div><!--container fluid-->
        </div>


  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>