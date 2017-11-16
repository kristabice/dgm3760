<?php
	require_once('variables.php');

if (isset($_POST['submit'])){

$name = $_POST[name];
$topic = $_POST[topic];
$comment = $_POST[textArea];




	
	//build db connection
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

//build the select query
$query = "INSERT INTO blog(name, topic, comment, date, approved)".
	" VALUES ('$name','$topic','$comment', now() ,'$approved')";

//now and try to talk to the database
$result = mysqli_query($dbconnection, $query) or die('query failed');

	
//were done so hang up

mysqli_close($dbconnection);
}
	?>


<!doctype html>
<html>
<head>
<?php include_once('header.php')?>

</head>


<body>
<div id="container">
<h1 class="clearFix">Make a Comment</h1>
<p class="approval"></p>

<fieldset>
	<legend>What do you want to say?</legend>
<form action="comment.php" method="POST" enctype="multipart/form-data">
<span>Name:</span><br><input class="name" type="text" value="" name="name" placeholder="John Doe"/><br>
<span>Topic:</span><br> 
<select name="topic">
<option>Quilting</option>
<option>Crochet</option>
<option>Sewing</option>
<option>Knitting</option>
	
</select><br>
<span>Comment:</span><br>
<textarea class="textArea" name="textArea"></textarea>

</fieldset>
<input name="submit" type="submit" class="submit">
</div>
</body>
</html>
