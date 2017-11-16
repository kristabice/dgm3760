<?php
//make sure they are logged in before going further.

if(!isset($_COOKIE['username'])){
	echo '<p class = "login" > Please <a href="login.php"> Log In </a> to access this page. </p>';
	exit();
}//end if





?>