<?php
$id = $_POST[id];
$first = $_POST[first];
$last = $_POST[last];
$department = $_POST[dept];
$phone = $_POST[phone];
$photo = $_POST[photo];



	
	$dbconnection = mysqli_connect('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');
		
	$query ="UPDATE employee_simple SET first='$first', last='$last', dept='$department', phone='$phone' WHERE id=$id";
	
	$result = mysqli_query($dbconnection, $query) or die('query failed');
	
	mysqli_close($dbconnection);
	

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
	
	echo "$first $last <br>";
	echo "$department <br>";
	echo "$phone <br>";
	
	echo '<img src="'.$filepath.$filename.'" alt="photo"/>';

	
	
	
	
	?>
<?php include 'footer.php';?>
</body>
</html>