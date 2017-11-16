<?php include_once('header.php');?>

<title>Search</title>
</head>

<body>
<div class="wrapper">
	<h1>Search</h1>
	<form action="search.php" method="post" enctype="multipart/form-data">
		<fieldset>
		<legend>What hobbies are you looking for?</legend>
		<label><span>Patterns:</span><br><input class="search" name="search" type="text"></label>
		</fieldset>
		<input type="submit" class="submit" name="submit">
	</form>
	
	<?php
		if(isset($_POST['submit'])){
			$tags = strtolower($_POST[search]);
			
			//REMOVE COMMAS FROM SEARCH FUNCTION
			$tagsCleanUp = str_replace(',',' ',$tags);
			
			// TURN LIST INTO AN ARRAY BASED ON THE 'SPACE CHARACTER
			$searchTerms = explode(' ', $tagsCleanUp);
		
			foreach($searchTerms as $temp ){
				if(!empty($temp)){
					$searchArray[] = $temp;
					
				}// end of the if
			}// end of foreach
			$wereList = array();
			foreach($searchArray as $temp){
				$whereList[] = "tags LIKE '%$temp%'";
				
			}//end of foreach
			//build the complete WHERE with OR between each term
			$whereClause = implode(' OR ',$whereList);
			
			
			//build the search query 
			$query = "SELECT * FROM hobbies";
			if(!empty($whereClause)){
				$query .= " WHERE $whereClause";
			}//end if
			echo "<h2>Search Results for '$tagsCleanUp' </h2>";
			
			require_once('variables.php');
			
			//connect to the database
			$dbconnection = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
			
			// now try to talk to the database
			$result = mysqli_query($dbconnection, $query) or die('query failed');
			
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_array($result)){
					echo '<h3>'.$row[name].'</h3>';
					
					
					$myResults = strtolower($row[tags]);
					
					foreach($searchArray as $temp){
						$insert = '<*** class="searchStyle">'.$temp.'</***>';
						$myResults = str_replace($temp, $insert, $myResults);
						
					}// end fo foreach
					//put span tag back in
					$myResults = str_replace('***', 'span', $myResults);
					
					echo '<p class ="searchResults">'.$myResults.'</p>';
				}//end while 
			} else{
				echo "No hobbies found matching <strong>$tags</strong>";
			}// end of else
	
		}
	
	
	?>
</div>
<?php include_once ('nav.php'); ?>
</body>
</html>
