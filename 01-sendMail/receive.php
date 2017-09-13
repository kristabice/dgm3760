<?php
//Load variables from the form

$name = $_POST[name];
$email = $_POST[email];
$phone = $_POST[phone];
$car = $_POST[car];
$color = $_POST[color];



//BUILD THE EMAIL

$to = 'bubgirl17@gmail.com';
$subject = 'Info Request';
$message = "$name has requested to enter the contest for the $color $car. You should contact them by email at $email or by text message at $phone.";

//send the email
mail($to, $subject, $message, 'FROM:'.$email);

?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>



<p class="feedback"><?php echo $name; ?>, thanks for filling out our form an email has been sent to <?php echo $email; ?>, or by text to the following phone number <?php echo $phone ?>. For your participation you have been entered into a drawing for a <?php echo $color ?> <?php echo $car ?>!</p>
	
	

	
	
	
</body>
</html>