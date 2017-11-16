<?php



	require_once('authorize.php');
	require_once('variables.php');
	
	//build db connection
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');


//select query
$query = "SELECT * FROM blog WHERE approved=0 ORDER BY date";

//now and try to talk to the database
$result = mysqli_query($dbconnection, $query) or die('query failed2');

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include_once('header.php') ?>
</head>


<body>
<div id="container">
<h1 class="clearFix">Blog Comments</h1>
<?php
	
if(mysqli_num_rows($result)== 0){
	echo '<p>All comments have been approved </p>';
}else{
	
	
	
	
//display what we found	
while($row = mysqli_fetch_array($result)){
	echo '<article>';
	echo '<a class="approve" href = "approve2.php?id='.$row['id'].'">Approve</a>';
	echo '<a class="delete" href = "delete.php?id='.$row['id'].'">Delete</a>';
	echo '<h3>'.$row['name'].'</h3>';
	echo '<p class = "topic">'.$row['topic'].'</p>';
	echo '<p>'.$row['comment'].'</p>';
	echo '<p class = "date">'.$row['date'].'</p>';
	echo '</article>';
	
}	
	
}
	

?>


</div> <!-- end container -->
</body>
</html>