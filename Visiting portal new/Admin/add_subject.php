<head>
	<script>
		function validateForm() {
  		var x = document.forms["subject"]["subject_name"].value;
    	var y = document.forms["subject"]["subject_description"].value;
    	var z = document.forms["subject"]["img"].value;
  		if (x == "" || y == "" || z == "") {
    	alert("Please insert all details");
    	return false;
  	}
}
	</script>
</head>
<?php 
if(isset($add))
{
	$sql=mysqli_query($con,"select * from subjects where subject_name='$subject_name'");
	if(mysqli_num_rows($sql))
	{
	echo "This subject is already added";	
	}		
	else
	{	
	$img=$_FILES['img']['name'];
	mysqli_query($con,"insert into subjects values('','$subject_name','$subject_description','$img')");	
	move_uploaded_file($_FILES['img']['tmp_name'],"../Image/Subjects/".$_FILES['img']['name']);
	echo "Subject added successfully";
	}
}
?>

<form name="subject" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
<table class="table table-bordered">
</br>
	<tr>	
		<th>Name</th>
		<td><textarea name="subject_name" class="form-control"></textarea>
		</td>
	</tr>
	
	<tr>	
		<th>Description</th>
		<td><textarea name="subject_description" class="form-control"></textarea>
		</td>
	</tr>
	
	<tr>	
		<th>Image</th>
		<td><input type="file" name="img" accept="image/*" class="form-control"/>
		</td>
	</tr>
	
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Submit" name="add"/>
		</td>
	</tr>
</table> 
</form>
