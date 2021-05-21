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
          <form class="form-inline my-2 my-lg-0 mr-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search_input">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">X</button>
              </div>
            <!-- <button class="btn btn-light btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
            <i class="fa fa-times"></i>
          </form>

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
      <div class="container text-center">
          <h1 class="text-center bg-primary text-white p-3">Products</h1>
      </div>
      <!-- Second Container -->
      <div class="container text-center m-2">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Filter
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class = "list-group" id = "filter">
                    <?php
                        require("mysqli_connect.php");
                        $fetch_categories = "select distinct type from inventory.products";

                        $response = mysqli_query($db_connection, $fetch_categories);

                        if($response)
                        {
                            while($row = mysqli_fetch_array($response)){ 
                                //echo $row['type'];
                                //echo "<br>";
                                ?>
                                <!-- <li class = "list-group-item" ><a class='dropdown-item' href=''><?//php echo $row['type']; ?> </a> </li> -->
                                <li class = "list-group-item dropdown-item" ><?php echo $row['type']; ?></li>
                                <?php                   
                            }
                        }
                        
                        // <a class="dropdown-item" href="#">Action</a>
                        // <a class="dropdown-item" href="#">Another action</a>
                        // <a class="dropdown-item" href="#">Something else here</a>
                        // <div class="dropdown-divider"></div>
                        // <a class="dropdown-item" href="#">Separated link</a>
                    ?>
                    </ul>
                </div>
              </div>
      </div>

      <!-- <button id="hide">Hide</button>
      <button id="show">Show</button> -->

      <div class="container text-center mb-4">

        <div id = "product-data">
        
        </div>
        
        <button class="btn btn-success" id="button1">Load More</button> 
      </div>
 
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>


      // $(document).ready(function(){
        
      //   $.ajax({
      //     url: 'table_data.php',
      //     success: function(data){
            
      //       $("#product-data").html(data);
      //     }
      //   })
      // });

        $(document).ready(function(){
          var product_count = 5;

          //more products loaded when button is clicked
            $("#button1").click(function(){
                //$("#product-data").load("table_data.php");
                product_count = product_count + 5;

                //echo var_dump($product_count);
                $.ajax({
                  url: 'table_data.php',
                  type:"POST",
                  data: {product_new_count : product_count},
                  
                  success: function(data){
                      $("#product-data").html(data);
                  }
                })
            });

            //default product loads
            $("#product-data").load("table_data.php", {
                product_new_count:product_count
            });

            //Search bar
            $("#search_input").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#product_table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });

            //filter
            $("#filter li").click(function(){
                var category = $(this).html();
                console.log(category);
                console.log(product_count);
                
                
                $("#product_table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(category) > -1)
                });
                
            });

        });

        // $(document).ready(function() {
        //     var product_count = 2;
        //     $("#button1").click(fucntion() {
        //         product_count = product_count + 2;
        //         $("#product-data").load("table_data.php", {
        //             product_new_count:product_count
        //         });
        //     });
        // });

    </script>

  </body>
</html>