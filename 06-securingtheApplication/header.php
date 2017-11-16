
<meta charset="utf-8">
<title>Home Page</title>
<link href="reset.css" type="text/css" rel="stylesheet">
<link href="styles.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

<script>
$(document).ready(function(){
var str=location.href.toLowerCase();
$(".navMenu a").each(function() {
if (str.indexOf(this.href.toLowerCase()) > -1) {
 $("a.active").removeClass("active");
$(this).addClass("active");
}
 });
 })

</script>


<div class="navStyle">
<nav>
	<ul class="navMenu">
		<a href="index.php" class="active"><li>Display</li></a>
		<a href="comment.php"><li>Make a Comment</li></a>
		<a href="approve.php"><li>Approve</li></a>

		
	</ul>
</nav>
</div>

