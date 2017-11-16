<?php

//delete the cookies by setting thier experations to an hour ago

$test1 = setcookie('username','',time()-3600);
$test2 = setcookie('firstname','',time()-3600);
$test3= setcookie('lastname','',time()-3600);

header('Location: index.php');


var_dump($test1);
var_dump($test2);
var_dump($test3);

?>