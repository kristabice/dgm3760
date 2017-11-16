<?php
// turn to thee approved page
header('Location: approve.php');


$id = $_GET['id'];

require_once('variables.php');

$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');


//build the select query

$query = "DELETE FROM blog WHERE id=$id";

// talk to database

$result = mysqli_query($dbconnection, $query) or die('query failed');








?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
