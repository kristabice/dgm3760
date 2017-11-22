<?php
session_start();
?>
<header>
<div class="container">
 <a href="index.php">
	<img src="img/Logo@72x.png" alt="film reel logo">
	<h1>Inspection Connection</h1>
	</a>
	</div>
</header>
<div class="container">
<div class="clearFix"></div>
<form action="search.php" method="post" enctype="multipart/form-data">
<div class="search">Search:<input type="text" name="searchB" value=""></div>
</form>

<?php
	$admin = 'admin';

	
	if(isset($_SESSION['username'])){ ?>
	
	<?php if($_SESSION['username'] === $admin){
		 
		echo '<a href="add.php"> Add Movies</a>';
		echo  "<p>Welcome, ".$_SESSION['firstname']." ".$_SESSION['lastname']; echo '</p>';
		echo '<a href="logout.php">Log-Out</a></p>	';	
	} else{ ?>
 <p>Welcome, <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; echo '</p>';
		echo '<a href="logout.php">Log-Out</a></p>	';				
	} 
									}
		
		else{ ?>
	<p>Welcome, 
	<a href="login.php">Log-in</a></p>
	<?php } ?>
</div>
