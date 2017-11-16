
<nav>

<p class="menu">Hello,
	<?php
	
	if(isset($_COOKIE['username'])){
		
		echo $_COOKIE['firstname'].' '.$_COOKIE['lastname'];
		echo ' <a href="logout.php">Log Out</a>';
		
		
		
	}else{
		echo '<a href="login.php">Log In</a>';
		
		
	}//end if
	
	
	?>

	</p>

	
</nav>
<div class="clearFix"></div>

