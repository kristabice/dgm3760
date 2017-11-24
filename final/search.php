<?php include_once('header.php')?>
<title>Untitled Document</title>
<?php include_once('nav.php')?>
</head>

<body>
<div class="container">
	
	
	
	<?php
		if(isset($_POST['Search'])){
			$tags = strtolower($_POST[searchB]);
			
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
				$whereList[] = "synopsis LIKE '%$temp%'";
				
			}//end of foreach
			//build the complete WHERE with OR between each term
			$whereClause = implode(' OR ',$whereList);
			
			
			//build the search query 
			$query = "SELECT * FROM Movies";
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
				while ($row = mysqli_fetch_array($result)){?>
				
							<div class="results">
							<figure>
							<img src="<?php echo $row['photo'];?>" alt="movie title">

							<div class="descrip">
							<h1><?php echo $row['title'];?></h1>

					
					<?php
					$myResults = strtolower($row[synopsis]);
					
					foreach($searchArray as $temp){
						$insert = '<*** class="searchStyle">'.$temp.'</***>';
						$myResults = str_replace($temp, $insert, $myResults);
						
					}// end fo foreach
					//put span tag back in
					$myResults = str_replace('***', 'span', $myResults);
					
					echo '<p class ="searchResults">'.$myResults.'</p></div><div class="clearFix"></div>';
														   
				}//end while 
			} else{
				echo "No movies were found matching <strong>$tags</strong>";
			}// end of else
	
		}
	
	
	?>
	
	
	
</div>
</body>
<?php include_once('footer.php')?>







