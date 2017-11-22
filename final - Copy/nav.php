<?php
session_start();
?>
<header>
<div class="container">
	<img src="img/Logo@72x.png" alt="film reel logo">
	<h1>Inspection Connection</h1>
	</div>
</header>
<div class="container">
<div class="clearFix"></div>
<form action="search.php" method="post" enctype="multipart/form-data">
<div class="search">Search:<input type="text" name="searchB" value=""></div>
</form>

<?php
	echo $_SESSION['username'];
	if(isset($_SESSION['username'])){ ?>
<p>Welcome, <?php $_SESSION['firstname']." ".$_SESSION['lastname']; echo '</p>';
	} else{ ?>
	<p>Welcome, 
<a href="login.php">Log-in</a></p>
<?php } ?>
</div>