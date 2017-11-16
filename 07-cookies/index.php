<?php
//make sure they are logged in before going further.




?>


<?php include_once('header.php');?>
<title>Home</title>
</head>

<body>

<div class="container">
<?php include_once('navlinks.php')?>
<h1>Find a Pattern</h1>


	<p class="patterns">Cowboy Babie Booties   <a class="view" href="details.php">View Pattern</a></p>
	<p class="patterns">Baby Afghan   <a class="view" href="details.php">View Pattern</a></p>
	<p class="patterns">Koala Arugami   <a class="view" href="details.php">View Pattern</a></p>
<form enctype="multipart/form-data" method="post" action="report.php">
	<input class="submit" name="submit" type="submit" value="Submit a Pattern">
</form>
<?php include_once('footer.php'); ?>