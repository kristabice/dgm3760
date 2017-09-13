<?php


$employee_id = $_GET[id];

//--------BUILD THE DATABASE CONNECTION WITH host, user, pass, database--------------------------
$dbconnection = mysqli_connect('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');

//-----------------------BUILD THE SELECT QUERY---------------------------------------------------
$query = "SELECT * FROM employee_simple WHERE id=$employee_id";

//-----------------------NOW TRY AND TALK TO THE DATABASE-----------------------------------------
$result = mysqli_query($dbconnection, $query) or die ('query failed');

//-----------------------PUT THE RESULTS INTO A VARIABLE-----------------------------------------
$found = mysqli_fetch_array($result);

//----------------------------VERIFY THAT THE PHOTO EXISTS---------------------------------------
if(file_exists('employees/'.$found['photo']) && $found['photo'] <> ''){
	$photoPath = 'employees/'.$found['photo'];
} else{
	$photoPath = 'employees/missing.jpg';
}; //end if






?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>05 - update Records</title>
</head>

<body>




<form action="updateDatabase.php" method="POST" enctype="multipart/form-data">

<fieldset>
	<legend>Name</legend>
	
	<span>First Name:</span><br><input type="text" name="first" value="<?php echo $found['first']; ?>" ><br>
	<span>Last Name:</span><br><input type="text" name="last" value="<?php echo $found['last']; ?>"><br>
	<span>Phone Number:</span><br><input type="tel" name="phone" value="<?php echo $found['phone']; ?>"><br>
</fieldset>

<fieldset>
	<legend>Department</legend>
	<span>Please Select:</span>
	<select name="dept">
	<option><?php echo $found['dept']; ?></option>
	<option>----------------------------</option>
		<option>Internet Tech</option>
		<option>Web Developement</option>
		<option>Animation</option>
		<option>Audio</option>
		<option>Cinema</option>
	</select>
</fieldset>
	
	<fieldset>
		<legend>Photo</legend>
		<span>Pick a photo of this employee</span>
		<input type="file" name="photo"><br>
		
		<span>File must be saved as a .jpg file.</span><br>
		<span>Please crop photo to 150px wide X 200px tall before uploading</span>
	</fieldset>
	<input type="hidden" name="id" value="<?php echo $found['id']; ?>"/>
	<input type="submit" name="submit" value="Update Employee" class="submitbtn"/>
	
</form>



<?php include 'footer.php';?>
</body>
</html>