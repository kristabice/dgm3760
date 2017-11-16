	<?php if(!isset($_COOKIE['username'])){ ?>
	<div class="mainMenu">
<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
	</ul>
</nav>

<!-- END OF NAV MENU -->


<div class="logo">
	<img src="img/logo.png" alt="logo">
</div>

<!-- END OF LOGO DIV -->
<div class="log">
	<a href="login.php">Login</a>
</div>
</div> <!-- end of main menu styling -->
<div class="clearFix"></div>
	<header>
	<div class="imgCont">
		<img src="img/header.jpg" alt="conpany header">
	</div>
	<div class="clearFix"></div>
	</header>
<?php } 

else{ ?>
	<div class="mainMenu">
<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="add.php">Add</a></li>
		<li><a href="delete.php">Delete</a></li>
		
		
	</ul>
</nav>
<!-- END OF NAV MENU -->

<div class="logo">
	<img src="img/logo.png" alt="logo">
</div>

<div class="log">
	<a href="logout.php">Logout</a>
</div>
</div> <!-- end of main menu styling -->
<div class="clearFix"></div>

	<header>
	<div class="imgCont">
		<img src="img/header.jpg" alt="conpany header">
	</div>
	<div class="clearFix"></div>
	</header>
<?php }
	?>