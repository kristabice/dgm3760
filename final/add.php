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
		<fieldset><legend>Movie Info:</legend>
			<label>Title:<input type="text" name="title" value=""></label><br>
			<label>Rating:	
			<select name="rate">
				<option>G</option>
				<option>PG</option>
				<option>PG-13</option>
				<option>R</option>
				<option>NR</option>
			</select><br>
			<label>About:<textarea name="description"></textarea></label><br>
			
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