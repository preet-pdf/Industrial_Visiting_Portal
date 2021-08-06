<?php 
include('../Admin/connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from places where place_id='$id' ");
$res=mysqli_fetch_assoc($sql);

$img=$res['image'];

unlink("../Image/Places/$img");

if(mysqli_query($con,"delete from places where place_id='$id' "))
{
header('location:dashboard.php?option=places');	
}

?>