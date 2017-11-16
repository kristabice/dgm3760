


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>05 - Manage Records</title>
</head>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="main.css" rel="stylesheet" type="text/css">

<?php include 'footer.php';?>
<body>


<div class="container">


<form action="add.php" method="POST" enctype="multipart/form-data" class="clearFix">

<fieldset>
	<legend>Name</legend>
	
	<span>First Name:</span><br><input type="text" name="first" value="" placeholder="Jane"><br>
	<span>Last Name:</span><br><input type="text" name="last" value="" placeholder="Doe"><br>
	<span>Phone Number:</span><br><input type="tel" name="phone" value="" placeholder="455-698-9999"><br>
</fieldset>

<fieldset>
	<legend>Department</legend>
	<span>Please Select:</span><br>
	<select name="dept">
		<option>Internet Tech</option>
		<option>Web Developement</option>
		<option>Animation</option>
		<option>Audio</option>
		<option>Cinema</option>
	</select>
</fieldset>
	
	<fieldset>
		<legend>Photo</legend>
		<span class="photo">Pick a photo of this employee</span>
		<input type="file" name="photo" class="file"><br>
		
		<span class="photo">File must be saved as a .jpg file.</span><br>
		<span class="photo">Please crop photo to 150px wide X 200px tall before uploading</span>
	</fieldset>
	<input type="submit" name="submit" value="Submit" class="submitbtn">
	
</form>


	</div>

</body>
</html>
