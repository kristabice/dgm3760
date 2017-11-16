<?php
require_once('variables.php');
//connet to the database
$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');

//build the querry for an inner join
$query = "SELECT * FROM dgm_emphasis ORDER BY value";

//now try and talk to the database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

?>
<?php include_once('header.php');
include_once('nav.php');
?>

<body>

<div class="wrapper">
<h1>Search by Emphasis</h1>
<ul class="searchList">
	<?php
	while($row = mysqli_fetch_array($result)){
		echo '<li class="links"><a " href="index.php?emphasis='.$row['emphasis_id'].'">';
		echo $row['value'];
		echo '</a></li>';
		
		
		
	};
	?>
</ul>


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
