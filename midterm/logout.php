<?php


session_destroy();
unset($_SESSION['username']);

//header('Location: index.php');

echo $_SESSION['username'];
?>