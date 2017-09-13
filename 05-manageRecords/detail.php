<?php


$employee_id = $_GET[id];
$employee_name=$_GET[first];

//--------BUILD THE DATABASE CONNECTION WITH host, user, pass, database--------------------------
$dbconnection = mysqli_connect('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');

//-----------------------BUILD THE SELECT QUERY---------------------------------------------------
$query = "SELECT * FROM employee_simple WHERE id=$employee_id";

//-----------------------NOW TRY AND TALK TO THE DATABASE-----------------------------------------
$result = mysqli_query($dbconnection, $query) or die ('query failed');

//-----------------------PUT THE RESULTS INTO A VARIABLE-----------------------------------------
$found = mysqli_fetch_array($result);

//----------------------------VERIFY THAT THE PHOTO EXISTS---------------------------------------
if(file_exists('employees/'.$found['photo']) && $found['photo'] <> ''){
	$photoPath = 'employees/'.$found['photo'];

} else{
	$photoPath = 'employees/missing.jpg';
}; //end if


?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>05 - Manage Records</title>
</head>

<body>
<?php
	
	
	
	echo  '<img src="'.$photoPath.'" alt="photo"/>';
	
	echo '<p>'.$_GET['first'].'</p>';
	
?>

</body>
</html>
