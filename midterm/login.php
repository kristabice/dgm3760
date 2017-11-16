<?php
if (isset($_POST['log'])){
	
	require_once('variables.php');
		//connetct to database
		$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
		
		$username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
		$password = mysqli_real_escape_string($dbconnection, trim($_POST['password']));
		$name = mysqli_real_escape_string($dbconnection, trim($_POST['name']));
		//$email= mysqli_real_escape_string($dbconnection, trim($_POST['email']));
		


		// look up user name in database
		$query = "SELECT * FROM employee_login_info WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($dbconnection, $query) or die('query failed');
		
		if(mysqli_num_rows($result) == 1){
			
			$row = mysqli_fetch_array($result);
			echo "this is working <br>";
			$test = setcookie('username', $row['username']);
			//setcookie('username', $row['username'], time()+(60*60*24*30), '/');
			//setcookie('name', $row['name'], time()+(60*60*24*30));
			//setcookie('email', $row['email'], time()+(60*60*24*30));
			
			echo '<pre>';
			var_dump($test);
			print_r($row['username']);
			print_r($_COOKIE);
			echo '</pre>';
			echo "this is working";
			
			//$_COOKIE['username'] = $row['username'];
			header('Location: index.php');
		
			
			
		}
		
		else{
			$feedback = '<p> Could not find an accound for '.$_POST['username'].'. Would you like to <a href = "signup.php"> create a new account</a>?</p>';
			
		
	
		}//end of else statement/end of else statement
}

?>

<?php include_once('header.php')?>
    <title>Checkout - Card</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <h1>Log In</h1>

    <div id="home" class="container">
     <div id="main">
		 <form enctype="multipart/form-data" method="post" action="login.php">
		<fieldset>
			
			<span>Username:</span><br><input type="text" name="username" value="<?php if(!empty($username)) echo $username; ?>" required><br>
			<span>Password:</span><br><input type="text" name="password" value="" required><br>



		</fieldset>
		<input type="submit" name="log" value="Log In" class="submit"><br>
		<a href="index.php" class="cancel">Cancel</a>



	</form>
    <?php  echo '<p>'.$_COOKIE['username'].'</p>'; ?>

     
   
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
