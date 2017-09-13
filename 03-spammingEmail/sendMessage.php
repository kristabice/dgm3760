<?php


$subject = $_POST[subject];
	
$message = $_POST[message];	

$from = "bubgirl17@gmail.com";






$dbconnection = mysqli_connect ('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');


// build the querry

$query = "SELECT *  FROM newsletter ";

//talk to database
$result = mysqli_query($dbconnection, $query) or die('query failed');

//display what we found 

while($row = mysqli_fetch_array($result)){
	$first_name = $row['name'];
	$last_name = $row['last'];
	$to = $row['email'];
	
	$newMessage = "Dear $first_name $last_name, \n  $message ";
	
	mail($to, $subject, $newMessage, 'From:'.$from);
	
};

//close database connection

mysqli_close($dbconnection);


?>








<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>send</title>
<link href="main.css" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
</head>
<header>
	<nav >
		<ul class="mainMenu keepOpen">
			<li><a href="index.html">HOME</a></li>
			<li><a href="index.html">ABOUT</a></li>
			<li  class="active"><a href="makeaMessage.php">MESSAGE</a></li>
		</ul>
	</nav>
</header>
<body class="keepOpen">
<p class="keepOpen">You sent emails to your interesed people.</p>
</body>
</html>