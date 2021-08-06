<table class="table table-bordered table-striped table-hover">
	<h1>User Details</h1><hr>
	<tr>
		<th>Sr No.</th>
		<th>College Name</th>
		<th>Mobile Number</th>
		<th>Email</th>
		<th>Username</th>
		<th>City</th>
	</tr>
	<?php 
	include("../config.php");
$i=1;
$sql=mysqli_query($conn,"select * from register");
while($res=mysqli_fetch_assoc($sql))
{
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['College_name']; ?></td>
		<td><?php echo $res['Mobile']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['username']; ?></td>
		<td><?php echo $res['City']; ?></td>
	</td>
	</tr>	
<?php 	
}
?>	