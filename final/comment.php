<?php 
session_start();

$name = $_SESSION['username'];

echo $name;
if(isset($_POST['cSubmit'])){
	$id = $_POST['id'];
	$comment = $_POST['comment'];
	
	

	if(isset($_POST['up'])){

	
	
	require_once('variables.php');
	$dbconnect = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
	
	$query = "INSERT INTO display_c(comment, movie_id, rate, name) VALUES ('$comment','$id', '1', '$name')";
	
	$results = mysqli_query($dbconnect, $query) or die('your query has miserably failed');
	
	header('Location: details.php?id='.$id);
	}
	
	
		
	if(isset($_POST['down'])){

	
	
	require_once('variables.php');
	$dbconnect = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
	
	$query = "INSERT INTO display_c(comment, movie_id, rate) VALUES ('$comment','$id', '2')";
	
	$results = mysqli_query($dbconnect, $query) or die('your query has miserably failed');
	
	header('Location: details.php?id='.$id);
	}
	
	
}



?>