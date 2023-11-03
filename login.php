<?php
session_start();
include("db.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>login signup page</title>
  </head>
  <body>
     <div class="container">
        <h1>LOGIN PAGE</h1>
        <form class= "form" method="post">
            <label for="email"><b>Email:</b></label>
            <input type="email" class="form-control" name= "email" >
            <br>
            <label for="password"><b>Password:</b></label>
            <input type="password" class="form-control" name= "Password" >
            <br> 
            <a href="index.php">DONT YOU HAVE AN ACCOUNT</a><br>
            <button name ="login" class="form-control" type="submit" class="btn btn-primary">
              signup</button>
          

        </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php

if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["Password"]))
{
  $email = $_POST["email"];
  $pw = $_POST["Password"];
 
  if($email ==""||$pw =="")
  {
    echo "please fill the details";
  }
  else
  {
    //check if user exists
    $sql = "SELECT * FROM users WHERE email = '". $email ."' AND Password ='". $pw ."' "; 
    $result = mysqli_query($conn , $sql);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION["user"] = $email;
        header("Location: welcome.php");
    }
    else
    {
        echo "user not found";
    }
  }
}
?>