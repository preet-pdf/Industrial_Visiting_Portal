<?php

session_start();
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="admin_data";
$conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);

 $pattern='/^[6-9]\d{9}$/';
 $pattern1='^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^';

 if(!$conn){
  die("Connection Failed!");
 }

 if(isset($_REQUEST['submit'])){
  if(($_REQUEST['College_name']=="") || ($_REQUEST['password']=="") || ($_REQUEST['gstin']=="") || ($_REQUEST['Mobile']=="") || ($_REQUEST['city']=="") || ($_REQUEST['add'] == "")){
        echo '<script>alert("Please fill all the fields!")</script>';
    }
    else if(preg_match($pattern, $_REQUEST['Mobile'])!=1) {
        echo '<script>alert("Mobile Number must start with 9,8,7 or 6")</script>';
    }
    
   
    else{
    $College=$_REQUEST['College_name'];
    $password=md5($_REQUEST['password']);
    $gstin=$_REQUEST['gstin'];
    $mobile=$_REQUEST['Mobile'];
    $city=($_REQUEST['city']);
    $add=$_REQUEST['add'];

    $unique_id=uniqid();
    $sql="INSERT INTO `org_detail` (`username`, `password`, `gstin`, `monum`, `city`, `address`,`unique_id`) VALUES ('$College','$password','$gstin','$mobile','$city','$add','$unique_id')";

    if(mysqli_query($conn,$sql)){
      echo "Registered successfully";
      header("location: login.php");
    }
    else{
      echo "Unable to insert the data";
    }
  }
 }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Welcome to Industrial visit booking portal!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Visit X</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Please Register Here:</h3>
<hr>
<form action="" method="post">
 
   <div class="form-group">
      <label>User Name</label>
      <input type="text" class="form-control" name ="College_name" id="College_name" placeholder="">
    </div>
  <div class="form-group">
      <label for="mobile">password</label>
      <input type="password" class="form-control" name ="password" id="password" placeholder="">
    </div>
  <div class="form-group">
    <label for="gstin">gstin</label>
    <input type="text" class="form-control" name="gstin" id="gstin" placeholder="">
  </div>
   <div class="form-group">
    <label for="monum">monum</label>
    <input type="text" class="form-control" name="Mobile" id="Mobile" placeholder="">
  </div>
   <div class="form-group">
    <label for="city">city</label>
    <input type="text" class="form-control" name="city" id="city" placeholder="">
  </div>
  <div class="form-group">
    <label for="add">address</label>
    <textarea type="text" class="form-control" name="add" id="add" placeholder=""></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Register</button>
  <div class="or-container">
    <div class="line-separator"></div>
    <div class="or-label">or</div>
    <div class="line-separator"></div>
  </div>
  <div class="row">
    <div class="col-md-12"> <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="#"><img src="https://img.icons8.com/color/16/000000/google-logo.png">Signup Using Google</a> </div>
    </div>
    </div>
  </div>
  
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>