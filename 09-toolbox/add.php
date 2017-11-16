<?php

if(isset($_POST['submit'])){
	//load the post data into PHP variables
	$name= $_POST[name];
	$tags= $_POST[tags];
	$day= $_POST[day];
	$month= $_POST[month];
	$year= $_POST[year];
	
	$date = $day.'-'.$month.'-'.$year;
	
	require_once('variables.php');
		//connect to the database
	$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
	
	//build querry
	$query = " INSERT INTO hobbies(name, day, tags) VALUES ('$name','$date','$tags')";
	
	//now talk to database conncetion
	$result = mysqli_query($dbconnection, $query) or die('query failed');
	
	// we are done so hang up
	mysqli_close($dbconnection);
	header('Location: index.php');
	exit();
}//end isset



?>
<?php include_once('header.php');?>

<title>Add a Pattern</title>
</head>

<body>
<div class="wrapper">
	<h1>Enter a Pattern</h1>
	
	<form action="add.php" method="post" enctype="multipart/form-data" name="travelInfo">
		
		<label><p>Pattern Name:</p><input name="name" value="" type="text" palceholder="Baby Afghan" pattern="[a-zA-Z- 1-10]{3,99}" required></label>
		<label><p>Todays Date:</p></label>
		<select name="day">
			<option>Day</option>
			<option>01</option>
			<option>02</option>
			<option>03</option>
			<option>04</option>
			<option>05</option>
			<option>06</option>
			<option>07</option>
			<option>08</option>
			<option>09</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option>23</option>
			<option>24</option>
			<option>25</option>
			<option>26</option>
			<option>27</option>
			<option>28</option>
			<option>29</option>
			<option>30</option>
			<option>31</option>
		</select>
		<select name="month">
			<option>Month</option>
			<option>01</option>
			<option>02</option>
			<option>03</option>
			<option>04</option>
			<option>05</option>
			<option>06</option>
			<option>07</option>
			<option>08</option>
			<option>09</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
		</select>
		<input name="year" value="" type="text" placeholder="1989" pattern="[0-9]{4}" required class="year">
		
		<label><p>Please add relevant search tags to your pattern</p>
		<textarea name="tags"></textarea>
		</label><br>
		<label><input type="submit" class="submit" value="Submit" name="submit"></label>
	</form>
	
	
	
	
</div>
<?php include_once ('nav.php'); ?>

</body>
</html>