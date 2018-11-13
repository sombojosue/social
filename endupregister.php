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
    <link rel="stylesheet" href="css/style1.css">
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
    <div class="row top_space" style="margin-top: 80px;">
      <div class="col-xs-12 col-sm-12 col-md-6">
        <h1 class="text-success">Social Network System</h1>
        <p class="text-success"> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
        <a class="btn-lg btn-success" href="login.php" style="margin-bottom: 10px;">Login</a>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6">
        <form method="post" enctype="multipart/data-form">
          <div style="background-color: white;padding-top: 10px;padding-left: 10px;padding-right: 10px;border:1px solid lightgray;border-radius: 5px;">
          <div class="form-group">
            <label>What's your favorite color?</label>
            <input type="text" name="answer" class="form-control" placeholder="Please write your answer">
          </div>
          <div class="">
            <label>Upload Images profile</label><br>
            <input type="file" name="file" placeholder="Choose Image">
          </div>
          <br>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Finish" style="width: 100%;padding-bottom: 5px;margin-bottom: 5px;">
            <br>
          </div>
        </div>
        </form>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
    //get information from user
    }
    ?>
    </div>
  </body>
</html>