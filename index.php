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
    <style type="text/css">
      body{
        background-image: url("images/bground.jpeg");
        background-repeat: no-repeat;
        position: relative;
        overflow: none;
      }
    </style>
    <title>SocialNet | Welcome</title>
    </head>
    <body>
    <div class="container">
    <div class="row top_space">
      <div class="col-xs-12 col-sm-12 col-md-6">
        <h1 class="text-success">Social Network System</h1>
        <p class="text-success"> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
        <a class="btn-lg btn-success" href="login.php" style="margin-bottom: 10px;">Login</a>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6">
        <form method="post">
          <div style="background-color: lightgray;padding: 10px;border-radius: 10px;">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" style="margin-top: 12px;">
          </div>

          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>

          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>

          <div class="form-group">
            <input type="date" name="date" class="form-control" placeholder="YYYY-MM-DD">
          </div>
          <div class="form-group">
            <input type="text" name="location" class="form-control" placeholder="location" style="margin-top: 12px;">
          </div>

          <div class="form-group">
            <input type="radio" name="gender" checked value="M">Male
            <input type="radio" name="gender" class="" value="F">Female
            <input type="radio" name="gender" class="" value="O">Others
          </div>
          <div class="form-group">
            <input type="checkbox" name="term" value="1">Term & condition
            <p class="text-success">ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="SIGN UP" style="width: 100%;">
          </div>
        </div>
        </form>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
    //Not user Allowed to connect into Social networking
    $user = array('admin','shadow','root','hacker');
    //get information from user
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $location = mysqli_real_escape_string($con,$_POST['location']);
    $gender = mysqli_real_escape_string($con,$_POST['gender']);
    if($_POST['term'] != 1){
    echo "<script>alert('Please Agre Term and condition')</script>";
    exit();
    }else{
    if(empty($name)){
     echo "<script>alert('Please Enter Name')</script>";
    }elseif(empty($username)){
    echo "<script>alert('Please Enter Username')</script>";
    }elseif(empty($password)){
    echo "<script>alert('Please Enter Password')</script>";
    }elseif(empty($email)){
    echo "<script>alert('Please Enter Email')</script>";
    }elseif(empty($date)){
    echo "<script>alert('Please Enter Your Birthday')</script>";
    }elseif(empty($gender)){
    echo "<script>alert('Please Enter Your Gender')</script>";
    }elseif (empty($location)) {
    echo "<script>alert('Please Enter Your Location')</script>";
    }
    else{
      if (!preg_match("/^[a-zA-Z ]*$/",$name )) {
       echo "<script>alert('Please Enter Letter only')</script>"; 
      }elseif (in_array($name, $user)) {
        echo "<script>alert('this name is not allowed')</script>";
      }elseif (in_array($username, $user)) {
        echo "<script>alert('this username is not allowed')</script>";
      }else{
        $sql_u = "select * from register where user ='$username'";
        $sql_n = "select * from register where user ='$name'";
        $res_u =mysqli_query($con,$sql_u);
        $res_n =mysqli_query($con,$sql_u);
        if (mysqli_num_rows($res_u) > 0) {
          echo "<script>alert('Username exist already')</script>";
        }elseif (mysqli_num_rows($res_n) > 0) {
         echo "<script>alert('name exist already')</script>";
        }
        else
        {
        //$hashpass = md5($password);
        $sql = "insert into register(name,user,pass,email,dob,location,gender,registerdate) values('$name','$username','$password','$email','$date','$location','$gender',now())";
        $res = mysqli_query($con,$sql);
        if ($res) {
        header("location:login.php");
      }
    }
  }
  }
  }
}
    ?>
    </div>
  </body>
</html>