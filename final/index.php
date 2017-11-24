<?php
// display movies
	require_once('variables.php');
	$dbconnect = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

	$query = "SELECT * FROM Movies ORDER BY title ASC";

	$result = mysqli_query($dbconnect, $query) or die('this is not going to work');

?>
<?php include_once('header.php')?>
	<title>Untitled Document</title>
<?php include_once('nav.php')?>

</head>

<body>
	<div class="container">
<?php
	while($row = mysqli_fetch_array($result)){ ?>
		
		<div class="row">
			<figure>
			<img src="<?php echo $row['photo'];?>" alt="movie title">
			
			<figcaption>
		<h1><?php echo $row['title'];?></h1>
		<p>Rating: <?php echo $row['rating'];?></p>
		<p><?php //echo $row['synopsis'];?></p>
			
			
		</figcaption>
		
		</figure>
		<div class="detail">
		<a href="details.php?id=<?php echo $row['id'];?>">View Details</a>
			</div>
				
				
		</div>
		
				
	<?php } ?>



	</div>
</body>
<?php include_once('footer.php')?>