<?php
$id = $_GET['id'];

require_once('variables.php');
$dbconnect = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

$query = "SELECT * FROM Movies WHERE id='$id'";

$result = mysqli_query($dbconnect, $query) or die('this is really not working for me');


?>
<?php include_once('header.php')?>
<title>Untitled Document</title>
<?php include_once('nav.php')?>

</head>

<body>
<div class="container">
	
<?php
	while($row = mysqli_fetch_array($result)){
		
		echo '<div class="dRow">';
		
		echo '<img src="'.$row['photo'].'" alt="movie posters" >';
		
		echo '</div>';
		
		echo '<div class="dRow">';
		
		echo '<h1>'.$row['title'].'</h1>';
		echo '<p>'.$row['rating'].'</p>';
		
		echo '</div>';
		
		echo '<div class="dRow">';
		echo '<p>'.$row['synopsis'].'</p>';
		
		echo '</div>';
		
	}

?>


<h2>Comment</h2>
	<form method="post" action="comment.php">
		<textarea name="comment"></textarea>
		<input type="hidden" name="id" value="<? echo $id?>">
		<input type="submit" name="cSubmit" value="Submit">
	</form>

<?php
	
	
	$comments = "SELECT * FROM display_c WHERE movie_id='$id'";

	$commentDisplay = mysqli_query($dbconnect, $comments) or die('your comments are not working');
			   
			   
	while($row2 = mysqli_fetch_array($commentDisplay)){ ?>
	
	<p><?php echo $row2['comment'];?></p>
		
	
	<?php	
	}
	
	?>
	
	
</div>
</body>
<?php include_once('footer.php')?>