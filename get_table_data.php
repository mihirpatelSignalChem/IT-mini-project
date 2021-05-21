<?php
          require("mysqli_connect.php");
          $fetch_products_sql = "select * from products";

          $response = mysqli_query($db_connection, $fetch_products_sql);

          //if there are items in products table
          if($response)
          {
              //print $result -> fetch_assoc();
      ?>
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

          mysqli_close($db_connection);
          
?>