<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DGM-Student Finder</title>
<link type="text/css" href="css/reset.css" rel="stylesheet">
<link type="text/css" href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mukta:400,800" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

<script>
$(document).ready(function(){
var str=location.href.toLowerCase();
$(".menu ul li a").each(function() {
if (str.indexOf(this.href.toLowerCase()) > -1) {
 $("a.active").removeClass("active");
$(this).addClass("active");
}
 });
 })

</script>
</head>