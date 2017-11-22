<?php
require_once('variables.php');
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$area = $_POST['dept'];
		$description = $_POST['description'];
		$phone = $_POST['phone'];
		$photo = $_POST['photo'];
$email = $_POST['email'];


	require_once('variables.php');
	if(isset($_POST['submit'])){
$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
		
	$query ="UPDATE employee_info SET firstname= '$firstname' , lastname='$lastname', area='$area', phone='$phone', description='$description', email='$em' WHERE id='$id'";
	
	$result = mysqli_query($dbconnection, $query) or die('query failed');
	
	mysqli_close($dbconnection);

	}

?>

<?php include_once('header.php');?>
<title>Update</title>
<?php include_once('nav.php');?>
<meta http-equiv="refresh" content="5; URL= details.php?id=<?php echo $id; ?>" >
</head>

<body>
<a href="add.php">BACK</a>
<p><?php echo $firstname.' '.$lastname;?> Was successfully updated in the database!</p>
</body>
<?php include_once('footer.php');?>



