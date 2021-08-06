<script>
	function delPlace(id)
	{
		if(confirm("You want to delete this Place ?"))
		{
		window.location.href='delete_place.php?id='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Place Details</h1><hr>
	<tr>
	<td colspan="6"><a href="dashboard.php?option=add_place" class="btn btn-primary">Add New Place</a></td>
	</tr>
	<tr style="height:40">
		<th>Sr No.</th>
		<th>Image</th>
		<th>Name</th>
		<th>Description</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
	
<?php 
include('../Admin/connection.php');
$i=1;
$sql=mysqli_query($con,"select * from places");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['place_id'];	
$img=$res['image'];
$path="../Image/Places/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><img src="<?php echo $path;?>" width="50" height="50"/></td>
		<td><?php echo $res['place_name']; ?></td>
		<td><?php echo $res['place_description']; ?></td>


		<td><a href="dashboard.php?option=update_place&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

		
		<td><a href="#" onclick="delPlace('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
	
</table>