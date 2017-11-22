<?php 

if(isset($_POST['cSubmit'])){
	
	$id = $_POST['id'];
	$comment = $_POST['comment'];
	
	
	require_once('variables.php');
	$dbconnect = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
	
	$query = "INSERT INTO display_c(comment, movie_id) VALUES ('$comment','$id')";
	
	$results = mysqli_query($dbconnect, $query) or die('your query has miserably failed');
	
	header('Location: details.php?id='.$id);
	
}



?>