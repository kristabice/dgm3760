<?php
require_once ('variables.php');
	$pattern = $_POST['pattern'];
if(isset($_POST['submit'])){
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

$insert = "INSERT INTO patterns(pattern)"." VALUES ('$pattern')";

$results =	mysqli_query($dbconnection, $insert) or die('insert query failed');
	header('Location: details.php');
}
?>
<?php include_once('protect.php');?>


<?php include_once('header.php');?>
<title>Home</title>
</head>

<body>

<div class="container">
<?php include_once('navlinks.php')?>
<h1>Submit a Pattern</h1>
	
	<form action="report.php" method="post">
		<fieldset>
			<legend>Submit a Pattern</legend>
			<span>Pattern Name</span><br><input class="pattern" type="text" value="" name="pattern"><br>
			<span>Creators Name</span><br><input class="pattern" type="text" value="" name="cname"><br>
			<span>Pattern Type</span><br>
			<select>
				<option>Crochet</option>
				<option>Sewing</option>
				<option>Quilting</option>
				<option>Knitting</option>
				<option>Weaving</option>
			</select>
		</fieldset>
		
	<input class="submit" name="submit" type="submit" value="Submit a Pattern">
	</form>



<?php include_once('footer.php'); ?>