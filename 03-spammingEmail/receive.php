<?php



$firstname = $_POST[first];
$lastname = $_POST[last];
$email = $_POST[email];


//hook to the database with host, user, pass database

$dbconnection = mysqli_connect ('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');

//build a querry

$query =  "INSERT INTO newsletter(name, last, email)".
	"VALUES ('$firstname','$lastname','$email')";


//talk to database
$result = mysqli_query($dbconnection, $query) or die('query failed');


//close database connection


mysqli_close($dbconnection);






?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>receive</title>
<link href="main.css" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
</head>
<header>
	<nav >
		<ul class="mainMenu keepOpen">
			<li  class="active"><a href="index.html">HOME</a></li>
			<li><a href="index.html">ABOUT</a></li>
			<li><a href="makeaMessage.php">MESSAGE</a></li>
		</ul>
	</nav>
</header>

<body >
<p class="keepOpen">Thank you for signing up for our newsletter!</p>
</body>
</html>