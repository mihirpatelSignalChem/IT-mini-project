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
        <h1 class="text-center bg-primary text-white p-3">Registration Page</h1>
    </div>
    <?php require "process_registration.php"?>
    <div class="container mt-5">
        <form action="registration.php" method = "POST">

            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="email" class="form-control" placeholder="Enter Username" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" placeholder="Enter First Name" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter Password" id="pwd1" name="password1" required>
            </div>
            <div class="form-group">
                <label for="pwd_2">Re Enter Password:</label>
                <input type="password" class="form-control" placeholder="Reenter Password" id="pwd2" name="password2" required>
            </div>
            <div class="form-group">
                <a href = "login.php">Already Registered?</a>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="is_admin" value="true"> Admin Registration </label>
            </div>
            <button type="submit" class="btn btn-primary" name = "register">Sign Up</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>