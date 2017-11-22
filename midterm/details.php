<?php 
	$id = $_GET['id'];
	require_once('variables.php');

	$dbconnect = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

	$query = "SELECT * FROM employee_info WHERE id= '$id'";

	$result = mysqli_query($dbconnect, $query) or die ('query failed utterly');
?>

<?php include_once('header.php');?>
<title>Employee Details</title>
<?php include_once('nav.php'); ?>
</head>

<body>

<div class="container">
	
	<?php
	
	while($row = mysqli_fetch_array($result)){
		echo '<div class="col">';
		echo '<div class = "dImg">';
		echo '<img src="img/'.$row['photo'].'" alt="image of employee"><br>';
		
		
		echo '</div>';
		
		echo '<div class = "dRow">';
		echo '<h1>'.$row['firstname'].' ' .$row['lastname'].'</h1><br/>';
		echo '<h3>'.$row['area'].'</h3><br/>';
		echo '<p>'.$row['description'].'</p><br/>';
		

		echo '</div>';
		echo '</div>';// column end
		?>
		
		
			<form method="post" action="email.php?id=<?php echo $row['id'];?>">
			<fieldset>
			<legend>Send me a Message:</legend><br>
			<label>Subject:<br><input type="text" name="subject" required></label>
			<label>Your Name:<br><input type="text" name="name" required></label>
			<label>Your Email:<br><input type="text" name="email" required></label>
			<label>Message:<br><textarea name="emailMess" ></textarea></label>
			</fieldset>
			<fieldset>
			<input type="submit" name="submit" value="Submit" class="submitbtn">
			</fieldset>
			</form>	
			
			
		<?php
		echo '<div class="btn">';
		echo '<a href = "index.php" class="button" > Back to Home </a>';
		echo '<a href="edit.php?id='.$row['id'].'" class="button" > Edit </a>';
		echo '<a href = "delete.php" class="button del" > Delete </a>';
		echo '</div>'; // end btn
	}
	
		
	
	?>
	
</div>
</body>
<?php include_once('footer.php'); ?>