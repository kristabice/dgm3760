<?php
require_once('variables.php');
//connet to the database
$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

$query = "SELECT * FROM dgm_emphasis";
$resultEmphasis = mysqli_query($dbconnection, $query) or die('query failed');

//get the software names from the database
$query = "SELECT * FROM dgm_packages ORDER BY package ASC";
$resultPackage = mysqli_query($dbconnection, $query) or die('query failed');





?>



<?php include_once('header.php');
include_once('nav.php');
?>

<body>
<h1 class="new">Add a New Student</h1>
<div class="wrapper">
	
	<form enctype="multipart/form-data" action="saveToDatabase.php" method="post" >
		<fieldset>
			<legend>Personal Information</legend>
			<span>First Name:</span><br><input type="text" name="firstname" class="firstname" value="" pattern="[a-zA-Z- ]{3,99}"><br>
			<span>Last Name:</span><br><input type="text" name="lastname" class="lastname" value="" pattern="[a-zA-Z- ]{3,99}"><br>
			<span>Favorite Pattern:</span><br><input type="text" name="website" class="website" value="">
		</fieldset>
		
		<fieldset>
		<legend>Gender</legend>
			<label><input type="radio" name="gender" class="gender" value="1">	<span>Male</span></label><br>
			<label><input type="radio" name="gender" class="gender" value="2">	<span>Female</span></label><br>
		</fieldset>
		
		<fieldset>
		<legend>Crafting Level</legend>
			<select name="emphasis">
				<label><option>Please Select ... </option></label>
				<?php
				while($row = mysqli_fetch_array($resultEmphasis)){
					echo '<option value="'.$row['emphasis_id'].'">'.$row['value'].'</option>';
				};
				
				?>
			</select>
		</fieldset>
		<fieldset>
			<legend>Crafting Skills</legend>
		<p>Check crafting skills you are proficient in:</p>
		<?php
			
			while($row = mysqli_fetch_array($resultPackage)){
			echo' <label><input type="checkbox" value="'.$row['package_id'].'" name="package[]">'.$row['package'].'</label><br>';
				
				
				
			}
			
			?>
		</fieldset>
		<input type="submit" name="submit" class="submit" value="Add New Student">
	</form>
	
	
	
</div>
</body>
</html>
