<script>
	function delSubject(id)
	{
		if(confirm("You want to delete this Subject ?"))
		{
		window.location.href='delete_subject.php?id='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Subject Details</h1><hr>
	<tr>
	<td colspan="6"><a href="dashboard.php?option=add_subject" class="btn btn-primary">Add New Subject</a></td>
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
$sql=mysqli_query($con,"select * from subjects");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['subject_id'];	
$img=$res['image'];
$path="../Image/Subjects/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><img src="<?php echo $path;?>" width="50" height="50"/></td>
		<td><?php echo $res['subject_name']; ?></td>
		<td><?php echo $res['subject_description']; ?></td>


		<td><a href="dashboard.php?option=update_subject&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

		
		<td><a href="#" onclick="delSubject('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
	
</table>