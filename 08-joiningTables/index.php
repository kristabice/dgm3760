<?php
$queryaddition = '';

if(isset($_GET[emphasis])){
	$queryaddition = "WHERE emphasis=$_GET[emphasis]";
}

require_once('variables.php');
//connet to the database
$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
// build the query for an inner join
$query = "SELECT * FROM dgm_student INNER JOIN dgm_emphasis ON (dgm_student.emphasis = dgm_emphasis.emphasis_id) $queryaddition ORDER BY last";

//now try to talk to the database
$result = mysqli_query($dbconnection, $query) or die ('query has failed');





?>

<?php 
include_once('header.php');
include_once('nav.php');
?>


<body>
<div class="wrapper">
<?php
	if(mysqli_num_rows($result) == 0){
		echo '<p>Sorry but no one maches the requested search.</p>';
	}
	//display what we found
	echo '<p>'.$searchid.'</p>';
	while($row = mysqli_fetch_array($result)){
		echo '<div class= "person">';
		
		//ternary operator -- replaces if else
		echo '<h2>'.$row['first'].' '.$row['last']. '</h2>';
		echo '<p>';
		echo ($row['gender'] == 1 ? 'Mr. ':'Ms. ').$row['last'];
		echo ' is a avid crafter who considers herself a '. $row['value'].' in her craft.</p>';
		
		echo '<p>';
		echo ($row['gender'] == 1 ? 'He ':'She ');
		echo 'is competent with the following crafting skills: </p>';
		
		//assign user id to variable in the next query
		$theid = $row['id'];
		
		
		// build another inner join query
		$query2 = "SELECT * FROM dgm_softwareskill INNER JOIN dgm_packages ON(dgm_softwareskill.package_id = dgm_packages.package_id) WHERE id = $theid";
		
		$resultPackage = mysqli_query($dbconnection, $query2) or die ('package query failed');

		while($row2 = mysqli_fetch_array($resultPackage)){
			echo '<p class="pkgs">'.$row2['package'].'<?p>';
			
		}// end packages

		
		echo '</div>';
		
	};

	?>
</div>
<footer>
	Built By Krista Bice
	
	<?php
	// we are done so hang up
	mysqli_close($dbconnection);
	?>
</footer>
</body>
</html>