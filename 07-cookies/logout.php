<?php

//delete the cookies by setting thier experations to an hour ago

setcookie('username','',time()-3600);
setcookie('firstname','',time()-3600);
setcookie('lastname','',time()-3600);

header('Location: index.php');




?>