<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>04-DELETING RECORDS</title>
<link href="main.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
</head>

<body>

<form <?php $_SERVER['PHP_SELF'];?> method="POST">
	<fieldset>
		<legend>Using an Array</legend>
		<p>Please select the email that you would like to remove</p>
	<?php
		//build the database connection
	$dbconnection = mysqli_connect ('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');
		
		
					//DELETE RECORDS FROM LIST
		if(isset($_POST['submit'])){
			foreach($_POST['todelete'] as $delete_id){
				//echo $delete_id;
				
		$query = "DELETE FROM newsletter WHERE id=$delete_id";				
				
		//talk to database
		$result = mysqli_query($dbconnection, $query) or die('query failed');

			};//close for each loop
			
		};//end of if statement for delete
		
		
		
	// DISPLAY ALL RECORDS
		$query = "SELECT *  FROM newsletter ";
		
		//talk to database
		$result = mysqli_query($dbconnection, $query) or die('query failed');
		
	
		
		
		

		
		//Display what we found
		
		while($row = mysqli_fetch_array($result)){
			echo '<label>';
			echo '<input type = "checkbox" value="'.$row['id'].'" name="todelete[]" />';
			echo $row['name'].' '.  $row['last'].' - '. $row['email']."<br>";
			echo '</label>';
			
			
		};
		
		
		
		// we are done so hang up
		mysqli_close($dbconnection);
		
	?>	
	<input type="submit" name="submit" value="Remove from list" class="submitBtn" />	
		
	</fieldset>
	
</form>





</body>
</html>