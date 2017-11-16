<?php
		if(isset($_POST[signup])){

		//connetct to database
		$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
	

		// look up user name in database
		$query = "INSERT INTO employee_login_info( name, username, password, email) VALUES ('$name','$username','$password','$email')'";
		$data = mysqli_query($dbconnection, $query) or die('query failed');
		
		}

?>
<?php include_once('header.php'); ?>
<title>Directory - Home</title>
<?php include_once('nav.php'); ?>

</head>

<form method="post" enctype="multipart/form-data" action="signup.php">
	<fieldset><legend>
		Sign up!
	
	</legend>
	
		<span>Name</span><input type="text" name="name" ><br>
		<span>Username</span><input type="text" name="username" ><br>
		<span>Password</span><input type="password" name="password" ><br>
		<span>Email</span><input type="email" name="email" ><br>
		</fieldset>
</form>

<body>
</body>
</html>