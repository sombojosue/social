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
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
      	<div style="background-color: lightgray;padding: 10px;border-radius: 10px;border:1px lightgray solid;">
      	<h5 class="bg-success text-center" style="margin-top: 12px;color: white;padding: 10px;">User Login Page </h5>
        <form method="post" action="">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Name" style="margin-top: 13px;">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" style="margin-bottom: 10px;">
            <input type="hidden" name="remember" value="remember">
            </div>
            <a href="forgetpass.php" style="margin-bottom:10px;">Forget Password</a>
            <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" style="width: 100%;margin-top: 10px;" value="Login">
          </div>
        </form>
    </div>
      </div>
      <?php
      include 'function/db_conf.php';
     if (isset($_POST['submit'])) {
	   //get informtion from user
	  $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    //checking for Empty username and password

    if(empty($username)){
    echo "<script>alert('Please Enter Username')</script>";
    //include 'login.php';
    }elseif(empty($password)){
    echo "<script>alert('Please Enter Password')</script>";
    //include 'login.php';
    }else{
      //$hashpass = md5($password);
    	$sql = "select * from register where user='$username' and pass='$password'";
    	$res = mysqli_query($con,$sql);
      while ($row = mysqli_fetch_array($res)) {
        if ($row['user'] == $username && $row['pass'] == $password) {
          session_start();
          $_SESSION['name'] = $row['name'];
          $_SESSION['user'] = $row['user'];
          $_SESSION['email'] = $row['email'];
          header("location:user/userlogin_success.php");
          exit();
        }
      }
      }
}
?>
    </div>
  </div>
  </body>
</html>
