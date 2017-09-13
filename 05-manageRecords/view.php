<?php

//--------BUILD THE DATABASE CONNECTION WITH host, user, pass, database--------------------------
$dbconnection = mysqli_connect('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');

//-----------------------BUILD THE SELECT QUERY---------------------------------------------------
$query = "SELECT * FROM employee_simple ORDER BY last ASC";

//-----------------------NOW TRY AND TALK TO THE DATABASE-----------------------------------------
$result = mysqli_query($dbconnection, $query) or die ('query failed');

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>


	<?php
	
//----------------------------DISPLAY WHAT FOUND-------------------------------------------------
	
	while($row = mysqli_fetch_array($result)){
		echo '<p><a href="detail.php?id='.$row['id'].'">';
		echo $row['last'].', '.$row['first'].' - '.$row['dept'];
		
		echo '</a>';
		echo '<a href="update.php?id='.$row['id'].'"> - update </a>';
		
		echo '</p>';
	}
	
	//WE'RE DONE SO HANG UP-----------------------------------------------------------------------
	mysqli_close($dbconnection);
	
?>

	<?php include 'footer.php';?>
</body>
</html>