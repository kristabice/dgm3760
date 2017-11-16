<?php

	require_once('variables.php');
	
	//build db connection
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');


//select query
$query = "SELECT * FROM blog WHERE approved=1 ORDER BY date";

//now and try to talk to the database
$result = mysqli_query($dbconnection, $query) or die('query failed');

?>





<!doctype html>
<html>
<head>

<?php include_once('header.php')?>

</head>


<body>
<div id="container">
<h1 class="clearFix">Blog Comments</h1>
<?php
	
	
	
	
	
	
//display what we found	
while($row = mysqli_fetch_array($result)){
	echo '<article>';
	echo '<h3>'.$row['name'].'</h3>';
	echo '<p class = "topic">'.$row['topic'].'</p>';
	echo '<p>'.$row['comment'].'</p>';
	echo '<p class = "date">'.$row['date'].'</p>';
	echo '</article>';
	
}	
	
	
	

?>
</div> <!-- end container -->
</body>
</html>