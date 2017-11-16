<?php

$first = $_POST[first];
$last = $_POST[last];
$department = $_POST[dept];
$phone = $_POST[phone];
$photo = $_POST[photo];

//-------------MAKE PHOTO PATH AND NAME----------------


$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);


$filename = $first. $last. time().'.'.$ext;

$filepath = 'employees/';
//VERIFY THAT IMAGE IS VALID-----------------------------------------------


//check image missing
$validImage = true;

if($_FILES['photo']['size']==0){
	echo 'ooops! You did not select an image!';
	$validImage = false;
	
};


//Check if image is too large
if($_FILES['photo']['size'] > 204800){
	echo 'oops that image size was larger than 200kb.';
	
	$validImage = false;
}


//check the file type
if($_FILES['photo']['type'] == 'image/gif'||$_FILES['photo']['type'] == 'image/jpeg'||$_FILES['photo']['type'] == 'image/pjpeg'||$_FILES['photo']['type'] == 'image/png'){
	//that must be a proper format
	
} else{
	// tell user not correct
	echo 'oops -- that file is the wrong format.';
	$validImage = false;
};

if($validImage == true){
	//upload file
	$tmp_name = $_FILES['photo']['tmp_name'];
	move_uploaded_file($tmp_name , "$filepath$filename");
	@unlink( $_FILES['photo']['tmp_name']);
	
	$dbconnection = mysqli_connect('localhost', 'kristabi_3760usr','LzP5Z#6pAB,=','kristabi_dgm3760play') or die('connection lost');
		
	$query =" INSERT INTO employee_simple(last, first, dept, phone, photo)". "VALUES ('$last','$first','$department','$phone','$filename')";
	
	$result = mysqli_query($dbconnection, $query) or die('query failed');
	
	mysqli_close($dbconnection);
	
}
else{
	//try again
	echo '<a href="index.php">Please try Again</a>';
};
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADD</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="main.css" rel="stylesheet" type="text/css">

</head>

<?php include 'footer.php';?>

<body>
<div class="clearFix container">

<div class="background">

<div class="imageList">
<?php
	
	echo '<img src="'.$filepath.$filename.'" alt="photo"/>';
	?>
	</div>
	 <div class="detailList">
	<?php
	echo "<p> $first $last </p><br>";
	echo "<p>$department </p><br>";
	echo "<p> $phone </p><br>";
	

	
	?>
		 </div>
</div>
	</div>
</body>
</html>