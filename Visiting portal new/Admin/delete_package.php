<?php 
include('../Admin/connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from packages where package_id='$id' ");
$res=mysqli_fetch_assoc($sql);

$img=$res['image'];

unlink("../Image/Packages/$img");

if(mysqli_query($con,"delete from packages where package_id='$id' "))
{
header('location:dashboard.php?option=packages');	
}

?>