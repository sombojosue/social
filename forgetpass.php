<?php
include 'function/db_conf.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>SocialNet | Welcome</title>
    <style>
      body{
        background-image: url("images/bground.jpeg");
        background-repeat: no-repeat;
        position: relative;
        overflow: none;
      }
    </style>
    </head>
    <body>
    <div class="container">
    <div class="row top_space">
      <div class="col-xs-12 col-sm-12 col-md-6">
        <h1 class="text-success">Social Network System</h1>
        <p class="text-success"> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
        <a class="btn-lg btn-success" href="index.php">SIGN UP</a>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6">
      	<form method="post" action="">
          <div style="background-color: lightgray;padding: 10px;border-radius: 10px;border:1px lightgray solid;">
            <h5 class="bg-success text-center" style="color: white;margin-top:12px;padding: 10px;border-radius: 5px;">User Forget Password </h5>
           <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" style="margin-top: 12px;">
          </div>

          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="New Password">
          </div>

          <div class="form-group">
            <input type="password" name="pass1" class="form-control" placeholder="Confirm Password" style="margin-bottom: 10px;">
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Reset" style="width: 100%;">
          </div>
        </div>
        </form>
      </div>
    </div>
     
    <?php
    if(isset($_POST['submit'])){
    //get information from user
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    $pass1 = mysqli_real_escape_string($con,$_POST['pass1']);
    if(empty($name)){
    echo "<script>alert('Please Enter name')</script>";
    }elseif(empty($email)){
    echo "<script>alert('Please Enter email')</script>";
    }elseif ($pass != $pass1) {
    echo "<script>alert('Password are not matching !!!')</script>"; 
    }
    else{
      //$hashpass = md5($pass);
     $sql ="update register set pass='$password' where name='$name' and email='$email'";
     $res = mysqli_query($con,$sql);
     if ($res) {
       echo "<script>alert('Password updated succefull')</script>";
     }
    }
    }
    ?>
  </div>
  </body>
</html>