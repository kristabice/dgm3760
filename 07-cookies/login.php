<?php

		//defauld message to user
		$feedback = '<p> <a href="signup.php" class="create"> Create an Account</a></p>';
		


	if (isset($_POST['submit'])){
	require_once('variables.php');

		//connetct to database
		$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
		
		
		$username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
		$password = mysqli_real_escape_string($dbconnection, trim($_POST['password']));
		$firstname = mysqli_real_escape_string($dbconnection, trim($_POST['firstname']));
		

		// look up user name in database
		$query = "SELECT * FROM users WHERE username = '$username' AND password = SHA('$password')";
		$data = mysqli_query($dbconnection, $query) or die('query failed');
		
		
		if(mysqli_num_rows($data) == 1){
			

			$row = mysqli_fetch_array($data);
			
			setcookie('username', $row['username'], time()+(60*60*24*30));
			setcookie('firstname', $row['firstname'], time()+(60*60*24*30));
			setcookie('lastname', $row['lastname'], time()+(60*60*24*30));
			
			header('Location: index.php');
			
			
		}
		else{
			$feedback = '<p> Could not find an accound for '.$_POST['username'].'. Would you like to <a href = "signup.php"> create a new account</a>?</p>';
			
		
	
		}//end of else statement
		
		
	}// end post?>
		
		
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/reset.css" type="text/css" rel="stylesheet">
<link href="css/main.css" type="text/css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">






<title>Log-in</title>
</head>
		
<body>
<div class="container">
<?php include_once('navlinks.php')?>
<h1>Log In</h1>
<?php echo $feedback; ?>
<div class="clearFix"></div>

<form enctype="multipart/form-data" method="post" action="login.php">
	<fieldset>
		<legend>Log in</legend>
		<span>Username:</span><br><input type="text" name="username" value="<?php if(!empty($username)) echo $username; ?>" required><br>
		<span>Password:</span><br><input type="password" name="password" value="" required><br>
	
		
		
	</fieldset>
	<input type="submit" name="submit" value="Log In" class="submit"><br>
	<a href="index.php" class="cancel">Cancel</a>
	
	
	
</form>


<div class="clearFix"></div>

</div>
</body>
<footer>
	<p>&copy; Krista Bice &bull; 2017</p>
</footer>
</html>
