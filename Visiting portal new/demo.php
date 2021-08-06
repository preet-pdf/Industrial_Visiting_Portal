<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn=mysqli_connect($servername, $username, $password,"requestdata");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
$id= $_POST['hid1'];
$act= $_POST['acc'];
$sql = "UPDATE requestdata SET checked=1 Where id =$id";

$result=mysqli_query($conn,$sql);
if(!$result){
    echo mysqli_error($conn);
}
else{
    echo $id;
}
?>