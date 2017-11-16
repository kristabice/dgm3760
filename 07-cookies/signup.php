<?php include_once('header.php');?>
<title>Sign Up</title>
</head>

<body>

<div class="container">
<?php include_once('navlinks.php')?>
<h1>Sign Up!</h1>

<?php
	require_once ('variables.php');
	
	
	/*$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];*/
	
	
	// build db connection
		//build db connection
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

$insert = "INSERT INTO users(firstname, lastname, username, password, password2)".
	" VALUES ('$firstname','$lastname','$username', '$password' ,'$password2')";
	
	if(isset($_POST['submit'])){
		$firstname = mysqli_real_escape_string($dbconnection, trim($_POST['firstname']));
		$lastname = mysqli_real_escape_string($dbconnection, trim($_POST['lastname']));
		$username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
		$password = mysqli_real_escape_string($dbconnection, trim($_POST['password']));
		$password2 = mysqli_real_escape_string($dbconnection, trim($_POST['password2']));
		
		
		/// chck to make sure all these have values
		if(($password == $password2) && !empty($username) && !empty($password) && !empty($password2)){
		
		// make sure someone is not already registered
		$query = "SELECT * FROM users WHERE username = '$username'";
		$alreadyexists = mysqli_query($dbconnection, $query) or die ('query failed');
			
		if(mysqli_num_rows($alreadyexists) == 0){
			//inseert data
			
			$query = "INSERT INTO users (firstname, lastname, username, password, date)"."
			VALUES('$firstname', '$lastname', '$username',SHA('$password'), NOW() )";
			mysqli_query($dbconnection, $query) or die('insert query failed');
			
			//confirm message
			$feedback =  '<p class="feedback"> Your new account has been sucessfully created </p>'.'<p class="feedback"> Return to the <a href="index.php">main page </a></p>';
			
			
			
			// make the cookies
			setcookie('username', $username, time() + (60*60*24*30)); //expires in 30 days
			setcookie('firstname', $firstname, time() + (60*60*24*30)); //expires in 30 days
			setcookie('lastname', $lastname, time() + (60*60*24*30)); //expires in 30 days
			
			
			
			//close connection
			mysqli_close($dbconnection);
			
			
			//exit page
			//exit();
			
			
			
			
			
			
		} else{
			$feedback =  '<p class="error"> An account already exists for this username. Please use a different name.</p>';
			
			
			
			
		}//end of user exists check
			
	
		}//end empty check
	}// end of isset
	
	
	
	?>
	<?php echo $feedback; ?>
	<form enctype="multipart/form-data" method="post" action="signup.php">
	<fieldset>
	<legend>Sign up!</legend>
	<span>First Name:</span><br>	<input type="text" class="name" name="firstname" required value="<?php if(!empty($firstname)) echo $firstname; ?> "><br>
	<span>Last Name:</span><br>	<input type="text" class="name" name="lastname" required value="<?php if(!empty($lastname)) echo $lastname; ?>"><br>
	<span>Username:</span><br>	<input type="text" class="name" name="username" required value="<?php if(!empty($username)) echo $username; ?>"><br>
	<span>Password:</span><br>	<input type="password" class="name" name="password" value=""><br>
	<span>Confirm Password:</span><br>	<input type="password" class="name" name="password2" value=""><br>
	
	
	
		
		</fieldset>
		<input type="submit" name="submit" value="Submit" class="submit">
			<a href="index.php" class="cancel">Cancel</a>
	</form>
	




<?php include_once('footer.php'); ?>