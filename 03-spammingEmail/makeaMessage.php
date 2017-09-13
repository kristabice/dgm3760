<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>spam email</title>

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

<body>

<div class="formLeft">
<form action="sendMessage.php" method="POST" enctype="multipart/form-data" name="subscribe" class="form">
<fieldset class="border"><legend>Subscibe:</legend>
<div class="centerForm">
<span>Subject</span><br><input type="text" name="subject" value=""><br>
<span>Message</span><br><textarea name="message" class="message"></textarea><br>


	<input class="button" type="submit" value="SUBMIT"/>
</div>
</fieldset>


	</form>
	
	</div>
	
	
</body>
</html>