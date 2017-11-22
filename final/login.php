<?php
session_start();
if (isset($_POST['log'])){
	
	require_once('variables.php');
		//connetct to database
		$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
		
		$username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
		$password = mysqli_real_escape_string($dbconnection, trim($_POST['password']));
		$name = mysqli_real_escape_string($dbconnection, trim($_POST['name']));
		//$email= mysqli_real_escape_string($dbconnection, trim($_POST['email']));
		


		// look up user name in database
		$query = "SELECT * FROM users WHERE username = '$username' AND password = SHA('$password')";
		$result = mysqli_query($dbconnection, $query) or die('query failed');
		
		if(mysqli_num_rows($result) == 1){
			
			$row = mysqli_fetch_array($result);
		
		
			
			$_SESSION['username'] = $username;
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
	
			header('Location: index.php');
		
			
			
		}
		
		else{
			$feedback = '<p> Could not find an account for '.$_POST['username'].'. Would you like to <a href = "signup.php"> create a new account</a>?</p>';
			
		
	
		}//end of else statement/end of else statement
}

?>

<?php include_once('header.php')?>
    <title>Checkout - Card</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
 
    <div id="home" class="container">
     <div id="main">
		 <form enctype="multipart/form-data" method="post" action="login.php">
		<fieldset>
			
			<span>Username:</span><br><input type="text" name="username" value="<?php if(!empty($username)) echo $username; ?>" required><br>
			<span>Password:</span><br><input type="text" name="password" value="" required><br>



		</fieldset>
		<input type="submit" name="log" value="Log In" class="submit"><br>
		<p>Don't have an Account? </p><a href="signup.php">Sign Up!</a>
		<a href="index.php" class="cancel">Cancel</a>



	</form>
 

     
   
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
