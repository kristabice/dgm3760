<?php
require_once('variables.php');

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$position = $_POST['position'];
	$phone = $_POST['phone'];
	$photo = $_POST['photo'];
	$bio = $_POST['bio'];

	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
		
	$query ="UPDATE employee_info SET firstname= '$firstname' , lastname='$lastname', area='$position', phone='$phone', description='$bio', photo='$photo' WHERE id='$id'";
	
	$result = mysqli_query($dbconnection, $query) or die('query failed');
	
	mysqli_close($dbconnection);
	

?>


<?php include('header.php'); ?>
<title>Update Database</title>


</head>
<?php include 'nav.php';?>

<body >
<div class="clearFix container">

<?php
	
	echo "$firstname $lastname <br>";
	echo "$department <br>";
	echo "$phone <br>";
	
	echo '<img src="'.$filepath.$filename.'" alt="photo"/>';

	
	
	
	
	?>
	</div>
</body>
<?php include 'footer.php';?>