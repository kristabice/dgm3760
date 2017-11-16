<?php //require_once('protect.php'); ?>
<?php include_once('header.php'); ?>
<title>View Employees</title>
</head>



<?php include_once('header.php'); ?>
<title>Directory - Home</title>
<?php include_once('nav.php'); ?>
</head>

<body>
<div class="container">
	
	<form enctype="multipart/form-data" action="submit.php" method="post">
		<fieldset><legend>Personal Info:</legend>
			<label>First Name:<input type="text" name="firstname" value=""></label><br>
			<label>Last Name:<input type="text" name="lastname" value=""></label><br>
			<label>Position:	
			<select name="dept">
				<option>Internet Tech</option>
				<option>Web Developement</option>
				<option>Animation</option>
				<option>Audio</option>
				<option>Cinema</option>
			</select><br>
			<label>Bio:<textarea name="description"></textarea></label><br>
			<label>Phone:<input type="tel" name="phone"></label><br>
	
		
		</fieldset>
		<fieldset class="photo">
			<legend>Photo</legend>
			<span>Pick a Photo</span>
			<input type="file" name="photo"><br>
		</fieldset>
		
			<input type="submit" name="submit" value="Submit">
	</form>
	
	
	
</div>

</body>
<?php include_once('footer.php'); ?>