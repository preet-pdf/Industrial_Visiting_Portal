<head>
	<script>
		function populate(s1,s2)
		{
			var s1=document.getElementById(s1);
			var s2=document.getElementById(s2);
			s2.innerHTML="";
			if(s1.value=="IT")
			{
				var optionArray = ['|Choose Place','amazon|Amazon','IBM|IBM','tcs|Tata Consultancy Services','crest|Crest Data Systems'];
			}
			else if(s1.value=="CS")
			{
				var optionArray = ['|Choose Place','reliance|Reliance Industries Limited','infosys|Infosys','infochips|eInfochips', 'cognizant|Cognizant'];
			}
			else if(s1.value=="Civil")
			{
				var optionArray = ['|Choose Place','adani|Adani Infra Limited','cube|Cube Construction Engineering Limited','montecarlo|Montecarlo Limited', 'cns|CNS Infrastructure Limited'];
			}
			else if(s1.value=="Mechanical")
			{
				var optionArray = ['|Choose Place','elecon|Elecon Engineering Companies Limited','techno|Techno Industries Limited','lancer|Lancer Laser Tech Limited','aia|Aia Engineering Limited'];
			}
			for(var option in optionArray)
			{
				var pair = optionArray[option].split("|");
				var newoption=document.createElement("option");
				newoption.value=pair[0];
				newoption.innerHTML=pair[1];
				s2.options.add(newoption);
			}
		}

		function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;

			return true;
		}

		function validateForm() {
  		var a = document.forms["package"]["package_name"].value;
    	var b = document.forms["package"]["package_subject"].value;
    	var c = document.forms["package"]["package_place"].value;
    	var d = document.forms["package"]["package_description"].value;
    	var e = document.forms["package"]["package_aamount"].value;
    	var f = document.forms["package"]["package_bamount"].value;
    	var g = document.forms["package"]["package_tamount"].value;
    	var h = document.forms["package"]["package_airamount"].value;
    	var i = document.forms["package"]["package_days"].value;
    	var j = document.forms["package"]["package_nights"].value;
    	var k = document.forms["package"]["img"].value;
  		if (a == "" || b == "" || c == "" || d == "" || e == "" || f == "" || g == "" || h == "" || i == "" || j == "" || k == "") {
    	alert("Please insert all details");
    	return false;
  	}
}
	</script>
</head>
<?php 
if(isset($add))
{
	$sql=mysqli_query($con,"select * from packages where package_name='$package_name'");
	if(mysqli_num_rows($sql))
	{
	echo "This package is already added";	
	}		
	else
	{	
	$unique_id=uniqid();
	$img=$_FILES['img']['name'];
	$res=mysqli_query($con,"insert into packages values('','$package_name','$package_subject','$package_place','$package_description','$package_aamount','$package_bamount','$package_tamount','$package_airamount','$package_days','$package_nights','$img','$unique_id')");	
	move_uploaded_file($_FILES['img']['tmp_name'],"../Image/Packages/".$_FILES['img']['name']);
	echo "Package added successfully";
	}
}
?>

<form name="package" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
<table class="table table-bordered">
</br>
	<tr>	
		<th>Name</th>
		<td><textarea name="package_name" class="form-control"></textarea>
		</td>
	</tr>	

	<tr>
		<th>Subject</th>
		<td>
		<select name="package_subject" id="slct1" onchange="populate(this.id,'slct2')" class="form-control">
			<option value="">Choose Subject</option>
			<option value="IT">IT</option>
			<option value="CS">Computer Science</option>
			<option value="Mechanical">Mechanical</option>
			<option value="Civil">Civil</option>
		</select>
		</td>
	</tr>

	<tr>
		<th>Place</th>
		<td>
		<select name="package_place" id="slct2" class="form-control">
		</select>
		</td>
	</tr>

	<tr>	
		<th>Description</th>
		<td><textarea name="package_description" class="form-control"></textarea>
		</td>
	</tr>

	<tr>	
		<th>Accomodation Amount</th>
		<td><input type="number" step="0.01" placeholder="0.00" name="package_aamount" class="form-control"/>
	</tr>

	<tr>	
		<th>Bus Amount</th>
		<td><input type="number" step="0.01" placeholder="0.00" name="package_bamount" class="form-control"/>
		</td>
	</tr>

	<tr>	
		<th>Train Amount</th>
		<td><input type="number" step="0.01" placeholder="0.00" name="package_tamount" class="form-control"/>
		</td>
	</tr>

	<tr>	
		<th>Airlines Amount</th>
		<td><input type="number" step="0.01" placeholder="0.00" name="package_airamount" class="form-control"/>
		</td>
	</tr>

	<tr>	
		<th>Number of days</th>
		<td><select name="package_days" class="form-control">
				<option value="">Choose number of days</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</td>
	</tr>


	<tr>	
		<th>Number of nights</th>
		<td><select name="package_nights" class="form-control">
				<option value="">Choose number of nights</option>
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
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