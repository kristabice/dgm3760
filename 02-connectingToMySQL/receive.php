<?php
//Load variables from the form

$name = $_POST[name];
$email = $_POST[email];
$phone = $_POST[phone];
$car = $_POST[car];
$color = $_POST[color];


//build database connection
$dbconnection = mysqli_connect('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die ('connection failed');


//build query
$query = "INSERT INTO index_inquiries(name, email, address,  destination, job) VALUES ('$name', '$email', '$phone','$color','$car')";


//now try and talk to the database
$result = mysqli_query($dbconnection, $query ) or die ('query failed');


//were done so hang up

mysqli_close($dbconnection);


?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>database php</title>
</head>

<body>



<p class="feedback"><?php echo $name; ?>, thanks for filling out our form an email has been sent to <?php echo $email; ?>, or by mail to the following address <?php echo $phone ?>. We will be sending out weekly emails with job listings for <?php echo $car ?> located int <?php echo $color ?></p>
	
	

	
	
	
</body>
</html>