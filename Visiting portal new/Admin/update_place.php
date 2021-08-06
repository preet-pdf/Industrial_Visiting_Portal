<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from places where place_id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update))
{
 if($_FILES['img']['name']){
   move_uploaded_file($_FILES['img']['tmp_name'],"../Image/Places/".$_FILES['img']['name']);
   $img="../Image/Places/".$_FILES['img']['name'];
 }
 else{
   $img=$_POST['img1'];
 }
mysqli_query($con,"update places set place_name='$place_name',place_description='$place_description',image='$img1' where place_id='$id' ");
header('location:dashboard.php?option=places');
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">

	<tr>	
		<th>Name</th>
		<td><textarea name="place_name" class="form-control"><?php echo $res['place_name']; ?></textarea>
		</td>
	</tr>
	

	<tr>	
		<th>Description</th>
		<td><textarea name="place_description" class="form-control"><?php echo $res['place_description']; ?></textarea>
		</td>
	</tr>
	
<tr>
<th>Image</th>
  <td>
    <img src="<?php echo $res['image']?>" width="100px" height="100px">
    <input type="file" name="img">
    <input type="hidden" name="img1" value="<?php echo $res['image']?>">
  </td>
</tr>

	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Place Details" name="update"/>
		</td>
	</tr>
</table> 
</form>