<?php
          require("mysqli_connect.php");

            $product_new_count = $_POST['product_new_count'];
         //echo var_dump($product_new_count);
            $product_new_count = intval($product_new_count);
            //echo var_dump($product_new_count);
            $fetch_products_sql = "SELECT * FROM `products` limit " . $product_new_count;
        //$fetch_products_sql = "select * from products";

          $response = mysqli_query($db_connection, $fetch_products_sql);

          //if there are items in products table
          if($response)
          {
              //print $result -> fetch_assoc();
      
      echo "<table class='table table-striped' id='product_table'>
              <thead>
                  <tr>
                  <th scope='col'>Product Id</th>
                  <th scope='col'>Name</th>
                  <th scope='col'>type</th>
                  <th scope='col'>Price</th>
                  <th scope='col'>Quantity</th>
                  <th scope='col'>Delete</th>
                  </tr>
              </thead>";
              
             
                while($row = mysqli_fetch_array($response)){ 
                    //echo "<tr> <td>  {$row['student_id']}  </td>  <td>  {$row['name']}  </td>  <td>  {$row['branch']}  </td> </tr>";
            
                    echo "<tbody>";
                    echo "<tr class=". $row['type'] .">";
                    //echo '<td> <a href = "product_details.php?fetch=". $row["product_id"].">$row["product_id"] </td>';
                    ?> <td> <a href = "product_details.php?fetch=<?php echo $row['product_id']; ?>"> <?php echo $row['product_id']; ?> </td> 
                    <?php
                    echo "<td> ".$row['name'] ."</td>";
                    echo "<td>".$row['type'] ."</td>";
                    echo "<td>". $row['price'] ."</td>";
                    echo "<td>". $row['quantity'] ."</td>";
                    
                    ?><td> <a href = "home.php?delete=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</td>
                    <?php
                    echo "</tr>";
                echo "</tbody>";
          }
            echo "</table>"; 
          }     
          //if there are no products in items table
          else{
                echo "Query not executed";
                echo mysqli_error($db_connection);
          }

          mysqli_close($db_connection);
          
?>