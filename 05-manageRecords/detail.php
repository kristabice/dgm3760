


<?php

$id = $_GET[id];

echo $_GET[id];
//--------BUILD THE DATABASE CONNECTION WITH host, user, pass, database--------------------------
$dbconnection = mysqli_connect('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');

//-----------------------BUILD THE SELECT QUERY---------------------------------------------------
$query = "SELECT * FROM employee_simple WHERE id= $id";

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
<title>Employee Details</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="main.css" rel="stylesheet" type="text/css">

<?php include 'footer.php';?>
</head>

<body>
<div class="display clearFix container">

<div class="background">
	<div class="imageList">
		<?php
	 
	 
	echo '<img class="displayImg" src="'.$photoPath.'" alt="photo"/>';
	
	
	?>
	
	</div>
	
 <div class="detailList">
<?php
	

	echo "<p class='detail'>"."Name: ".$found['first']." ".$found['last']."</p>" ;
	echo "<p class='detail'>"."Department: ".$found['dept']."</p>" ;
	echo "<p class='detail'>"."Phone Number: ".$found['phone']."</p>" ;
	
		?>
		</div>
	
	
	
	</div><!--background color-->
	
	</div>

</body>
</html>