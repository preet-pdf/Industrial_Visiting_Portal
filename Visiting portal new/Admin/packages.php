<script>
	function delPackage(id)
	{
		if(confirm("You want to delete this Package ?"))
		{
		window.location.href='delete_package.php?id='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Package Details</h1><hr>
	<tr>
	<td colspan="14"><a href="dashboard.php?option=add_package" class="btn btn-primary">Add New Package</a></td>
	</tr>
	<tr style="height:40">
		<th>Sr No.</th>
		<th>Image</th>
		<th>Name</th>
		<th>Subject</th>
		<th>Place</th>
		<th>Description</th>
		<th>Accomodation Amount</th>
		<th>Bus Amount</th>
		<th>Train Amount</th>
		<th>Airlines Amount</th>
		<th>Number of days</th>
		<th>Number of nights</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
	
<?php 
include('../Admin/connection.php');
$i=1;
$sql=mysqli_query($con,"select * from packages");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['package_id'];	
$img=$res['image'];
$path="../Image/Packages/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><img src="<?php echo $path;?>" width="50" height="50"/></td>
		<td><?php echo $res['package_name']; ?></td>
		<td><?php echo $res['package_subject']; ?></td>
		<td><?php echo $res['package_place']; ?></td>
		<td><?php echo $res['package_description']; ?></td>
		<td><?php echo $res['package_aamount']; ?></td>
		<td><?php echo $res['package_bamount']; ?></td>
		<td><?php echo $res['package_tamount']; ?></td>
		<td><?php echo $res['package_airamount']; ?></td>
		<td><?php echo $res['package_days']; ?></td>
		<td><?php echo $res['package_nights']; ?></td>


		<td><a href="dashboard.php?option=update_package&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

		
		<td><a href="#" onclick="delPackage('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
	
</table>