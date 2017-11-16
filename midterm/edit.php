<?php
	$id = $_GET['id'];
	
	require_once('variables.php');
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

	$query = "SELECT * FROM employee_info WHERE id = '$id'";
	
	$result = mysqli_query($dbconnection, $query) or die ('this is not working');

	$row = mysqli_fetch_array($result);
	
		if(file_exists('employees/'.$row['photo']) && $row['photo'] <> ''){
			$photoPath = 'employees/'.$row['photo'];
		} else{
			$photoPath = 'employees/missing.jpg';
		}; //end if
	
?>
<?php //require_once('protect.php'); ?>
<?php include_once('header.php'); ?>
<title>View Employees</title>
</head>



<?php include_once('header.php'); ?>
<title>Directory - Edit</title>
<?php include_once('nav.php'); ?>
</head>

<body>
<div class="container">
	
	<form enctype="multipart/form-data" action="upData.php" method="post">
		<fieldset><legend>Personal Info:</legend>
			<label>First Name:<br><input type="text" name="firstname" value="<?php echo $row['firstname'];?>"></label><br>
			<label>Last Name:<br><input type="text" name="lastname" value="<?php echo $row['lastname'];?>"></label><br>
			<label>Position:<br>	
			<select name="dept">
				<option><?php echo $row['area'];?></option>
				<option>Internet Tech</option>
				<option>Web Developement</option>
				<option>Animation</option>
				<option>Audio</option>
				<option>Cinema</option>
			</select><br>
			<label>Bio:<br><textarea name="description"><?php echo $row['description'];?></textarea></label><br>
			<label>Phone:<br><input type="tel" name="phone" value="<?php echo $row['phone'];?>"></label><br>
	
		
		</fieldset>
		<fieldset class="photo">
			<legend>Photo</legend>
			<span>Pick a Photo</span>
			<input type="file" name="photo"><br>
		</fieldset>
	
		<fieldset>
		<input type="submit" name="submit" value="Submit" class="submitbtn">
		</fieldset>

	</form>
	
	
	
</div>

</body>
<?php include_once('footer.php'); ?>