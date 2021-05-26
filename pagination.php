<?php
    
    require("mysqli_connect.php");
    $limit = 5;
    
    if(!isset($_SESSION)) { 
        session_start(); 
    }

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;

	$query = "SELECT * FROM products LIMIT $offset, $limit";

	$result = mysqli_query($db_connection, $query);

	$output = "";

    if (mysqli_num_rows($result) > 0) {

        echo "<table class='table table-striped' id='product_table'>
        <thead>
            <tr>
            <th scope='col'>Product Id</th>
            <th scope='col'>Name</th>
            <th scope='col'>type</th>
            <th scope='col'>Price</th>
            <th scope='col'>Quantity</th>";
            if(isset($_SESSION["logged_in"])){
                if($_SESSION['logged_in'] === "true"){
                    echo "<th scope='col'>Delete</th>";
                }
            }
        echo "</tr>
        </thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            //echo "<tr> <td>  {$row['student_id']}  </td>  <td>  {$row['name']}  </td>  <td>  {$row['branch']}  </td> </tr>";
            
                
                echo "<tr class=". $row['type'] .">";
                //echo '<td> <a href = "product_details.php?fetch=". $row["product_id"].">$row["product_id"] </td>';
                ?> <td> <a href = "product_details.php?fetch=<?php echo $row['product_id']; ?>"> <?php echo $row['product_id']; ?> </td> 
                <?php
                echo "<td> ".$row['name'] ."</td>";
                echo "<td>".$row['type'] ."</td>";
                echo "<td>". $row['price'] ."</td>";
                echo "<td>". $row['quantity'] ."</td>";
                
                if(isset($_SESSION["logged_in"])){
                    if($_SESSION['logged_in'] === "true"){
                        ?><td> <a href = "home.php?delete=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</td>
                        <?php
                    }
                }

                echo "</tr>";
            
        }
        echo "</tbody>";
        echo "</table>";
        
        $sql = "SELECT * FROM products";

        $records = mysqli_query($db_connection, $sql);

        $totalRecords = mysqli_num_rows($records);

        $totalPage = ceil($totalRecords/$limit);

        $output.="<ul class='pagination justify-content-center' style='margin:20px 0'>";

        for ($i=1; $i <= $totalPage ; $i++) { 
            if ($i == $page_no) {
                $active = "active";
            }
            else{
                $active = "";
            }

            $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
        }
        
        $output .= "</ul>";

        echo $output;
        
    }
    //if there are no products in items table
    else{
        echo "Query not executed";
        echo mysqli_error($db_connection);
    }
?>