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
<title>Delete Employees</title>
</head>

<body>
<h1>Delete Employees</h1>

<?php
	
//----------------------------DISPLAY WHAT FOUND-------------------------------------------------
	
	while($row = mysqli_fetch_array($result)){
		echo '<p>';
		echo $row['last'].', '.$row['first'].' - '.$row['dept'];
		
		echo '  <a href="delete2.php?id='.$row['id'].'">delete</a>';
		
		echo '</p>';
	}
	
	//WE'RE DONE SO HANG UP-----------------------------------------------------------------------
	mysqli_close($dbconnection);
	
?>	

<?php include 'footer.php';?>

</body>
</html>