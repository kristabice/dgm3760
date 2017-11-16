<?php

	$username = 'admin';	
	$password = 'admin';

if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)){
	header('HTTP/1.1 401 Unauthroized');
	header('WWW-Authenticate: Basic realm="Up to Date"');

	exit('no access for you!');
	
}//end if

?>





