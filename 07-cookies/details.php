<?php include_once('protect.php');

	
		require_once('variables.php');
	
	//build db connection
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');


//select query
$query = "SELECT * FROM patterns";

//now and try to talk to the database
$result = mysqli_query($dbconnection, $query) or die('query failed');

?>
	




<?php include_once('header.php');?>
<title>Patterns</title>
</head>

<body>

<div class="container">
<?php include_once('navlinks.php')?>
<h1>Patterns</h1>

<?php
	

	while($row = mysqli_fetch_array($result)){
	echo '<article>';
	echo '<h3><a href="#">'.$row['pattern'].'</a></h3>';
	echo '</article>';
	
}	
	?>
	
</div>
<?php include_once('footer.php');?>
</body>
</html>
