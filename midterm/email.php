<?php


$subject = $_POST[subject];
	
$message = $_POST[emailMess];	
$from = $_POST[email];
$name =$_POST[name];
$id = $_GET['id'];



require_once('variables.php');

$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');


// build the querry

$query = "SELECT email  FROM employee_info WHERE id= '$id' ";

//talk to database
$result = mysqli_query($dbconnection, $query) or die('query failed');

//display what we found 

$row = mysqli_fetch_array($result);
	
	$to = $row['email'];
	
	$newMessage = "New Message From $name, \n  $message ";
	
	mail($to, $subject, $newMessage, 'From:'.$from);



//close database connection

mysqli_close($dbconnection);


?>
<?php header('Location: index.php');?>


