<?php
// turn to thee approved page
header('Location: approve.php');

require_once('authorize.php');
$id = $_GET['id'];

require_once('variables.php');

	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');


//build the select query

$query = "UPDATE blog SET approved=1 WHERE id=$id";

// talk to database

$result = mysqli_query($dbconnection, $query) or die('query failed');








?>