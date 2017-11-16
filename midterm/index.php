<?php
require_once('variables.php');

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$position = $_POST['position'];
	$photo = $_POST['photo'];
	$bio = $_POST['bio'];

	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

	$query = "SELECT * FROM employee_info"; 
	
	$result = mysqli_query($dbconnection, $query) or die('this is not working');
?>
<?php include_once('header.php'); ?>
<title>Directory - Home</title>
<?php include_once('nav.php'); ?>
</head>
<body>
<div class="container">
	
	<?php
	
	while($row = mysqli_fetch_array($result)){
		echo '<div class = "row">';
		echo '<img src="img/'.$row['photo'].'" alt="image of employee"><br>';
		
		
		
	
		echo '<h1>'.$row['firstname'].' ' .$row['lastname'].'</h1><br/>';
		echo '<h3>'.$row['area'].'</h3><br/>';
		echo '<a class =" details" href="details.php?id='.$row['id'].'" >View Details</a>';
		//echo '<p>'.$row['description'].'</p><br/>';
		echo '</div>';
	}
	
	?>
	
</div>

</body>
<?php include_once('footer.php'); ?>