<?php 
session_start();



echo $name;
if(isset($_POST['cSubmit'])){
	$id = $_POST['id'];
	$comment = $_POST['comment'];
	$thumb = $_POST['thumb'];
	$name = $_SESSION['username'];

	

	
	
	require_once('variables.php');
	$dbconnect = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
	
	$query = "INSERT INTO display_c(comment, movie_id, rate, name) VALUES ('$comment','$id', '$thumb', '$name')";
	
	$results = mysqli_query($dbconnect, $query) or die('your query has miserably failed thumb up');
	
	header('Location: details.php?id='.$id);

	



}
?>