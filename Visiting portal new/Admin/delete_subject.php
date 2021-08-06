<?php 
include('../Admin/connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from subjects where subject_id='$id' ");
$res=mysqli_fetch_assoc($sql);

$img=$res['image'];

unlink("../Image/Subjects/$img");

if(mysqli_query($con,"delete from subjects where subject_id='$id' "))
{
header('location:dashboard.php?option=subjects');	
}

?>