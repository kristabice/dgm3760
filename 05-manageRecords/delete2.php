<?php

$employee_id = $_GET[id];


//--------BUILD THE DATABASE CONNECTION WITH host, user, pass, database--------------------------
$dbconnection = mysqli_connect('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');

//-----------------DELETE SELECTED RECORD (IN FROM POST)-------------------------------------------
if (isset($_POST['submit'])){
	//BUILD A SELECT QUERY

	$query = "DELETE FROM employee_simple WHERE id=$_POST[id]";
	

	
	//--------NOW TRY AND DELETE THE RECORD-----------------------------------
	$result = mysqli_query($dbconnection, $query) or die('delete query failed');
	
	//delete the image
	@unlink($_POST['photo']);
	
	
	
	
	//REDIRECT 
	header("Location: http://dgm3760.kristabice.com/05-manageRecords/delete.php");
	
	/// make sure code below does not exicute when we redirect
	exit;
	
}







//-----------------------------DISPLAY SELECTED RECORDS-------------------------------------------
$query = "SELECT * FROM employee_simple WHERE id=$employee_id";

//----------------------------------NOW TALK TO THE DATABASE----------------------------------------
$result = mysqli_query($dbconnection, $query) or die ('query failed');

//---------------------------PUT THE RESULTS IN A VARIABLE----------------------------------------
$found = mysqli_fetch_array($result);





?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Detail employee directory</title>
</head>

<body>
<h1>Deleting and Employee!</h1>
<div class="employee">
	<form action="delete2.php" method="post">
		<?php
		//Display what we found
		echo '<h2>'.$found['first'].' '.$found['last'].'</h2>';
		echo '<p>';
		echo $found['dept'].'<br>'.$found['phone'];
		echo '</p>';

		
		?>
		<input type="hidden" name="photo" value="employees/<?php echo $found['photo'];?>"/>
		<input type="hidden" name="id" value="<?php echo $found['id'];?>"/>
		<input type="submit" name="submit" value="DELETE THIS PERSON"/>
		&nbsp; <a href="delete.php">Cancel</a>
	</form>
	
	
</div>


</body>
</html>