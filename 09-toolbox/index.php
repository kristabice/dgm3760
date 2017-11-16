<?php

	require_once('variables.php');
		//connect to the database
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
	
	// build the select query
	$query = "SELECT * FROM hobbies ORDER BY name ASC";

	// now try to talk to the database
	$result = mysqli_query($dbconnection, $query) or die('query failed');

	//function to turn a month day into a month name.
	function convertMonth($a){
		switch($a){
				case 1:
				$b="January";
				break;
				case 2:
				$b="February";
				break;
				case 3:
				$b="March";
				break;
				case 4:
				$b="April";
				break;
				case 5:
				$b="May";
				case 6:
				$b="June";
				break;
				case 7:
				$b="July";
				break;
				case 8:
				$b="August";
				break;
				case 9:
				$b="September";
				break;
				case 10:
				$b="October";
				break;
				case 11:
				$b="November";
				break;
				case 12:
				$b="December";
				break;
		}
		return $b;
	}//end of function
	

?>
<?php include_once('header.php');?>
<title>Home</title>
</head>

<body>
<div class="wrapper">
<h1>Patterns</h1>	
	<?php
	//display what we found
	while($row = mysqli_fetch_array($result)){
		//substr($string, start, length)
		$day = substr($row[day], 0 ,2 );
		$monthNum = substr($row[day],3 , 2);
		$monthName = convertMonth($monthNum);//call a function
		$year = substr($row[day], 6  ,4);
		
		
		echo '<h2>'.$row[name].'</h2>';
		echo '<p> Submission Date: '.$monthName.' '.$day.', '.$year;
		echo '<p>'.$row[tags].'</p>';
	};
	
	// we are done so hang up
	mysqli_close($dbconnection);
	
	?>
</div>
<?php include_once('nav.php');?>
</body>
</html>