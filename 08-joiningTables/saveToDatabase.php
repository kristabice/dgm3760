<?php
//

$first = $_POST['firstname'];
$last = $_POST['lastname'];
$gender = $_POST['gender'];
$website = $_POST['website'];
$emphasis = $_POST['emphasis'];


require_once('variables.php');
//connet to the database
$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');



// build querr
$query = "INSERT INTO dgm_student(first, last, gender, website, emphasis) VALUES ('$first','$last','$gender','$website','$emphasis')";


//NOW TRY TO TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die('query failed save data');

//----------------------------------UPDATE SOFTWARE SKILLS---------------------------------------------------------------------//


//this is th id of the user just added
$recent_id = mysqli_insert_id($dbconnection);

//loop through the array that contains all the packages they selected
foreach($_POST['package'] as $package_id){
	$query = "INSERT INTO dgm_softwareskill (id, package_id) VALUES ($recent_id, $package_id)";
	
	//now try and delet the record
	$result = mysqli_query($dbconnection, $query) or die ('update software skill query failed');
	
	
	
	
	
};//end of foreach


//we are done so hang up 
mysqli_close($dbconnection);






?>






<?php 
include_once('header.php');
include_once('nav.php');
?>


<body>
<p class="feedback">An entry for <?php $first. ' '.$last ?> has been added to the DGM database.</p>
<p class="feedback"><a href="new.php">Add another student</a></p><br>
<p class="feedback"><a href="index.php">Return to the home page</a></p><br>
</body>
</html>