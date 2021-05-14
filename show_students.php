<?php
    include ();
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class = "container">
        <?php 
            require("mysqli_connect.php");


            $query = "select * from students";

            $response = mysqli_query($db_connection, $query);

            if($response)
            {
                //print $result -> fetch_assoc();
                ?>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Branch</th>
                    </tr>
                </thead>

                <?php 
                while($row = mysqli_fetch_array($response)){
                    //echo "<tr> <td>  {$row['student_id']}  </td>  <td>  {$row['name']}  </td>  <td>  {$row['branch']}  </td> </tr>";
                    echo "<tbody>
                    <tr>
                    <td> {$row['student_id']} </td>
                    <td> {$row['name']} </td>
                    <td> {$row['branch']} </td>
                    </tr>
                </tbody>";
                } 
                //echo "</table>";

            }
            else{
                echo "Query not executed";
                echo mysqli_error($db_connection);
            }

            mysqli_close($db_connection);
            
            
        ?>
        </div>
    </body>
    </html>

