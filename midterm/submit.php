<?php
require_once('variables.php');

	$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$area = $_POST['dept'];
		$description = $_POST['description'];
		$phone = $_POST['phone'];
		$photo = $_POST[photo];

//-------------MAKE PHOTO PATH AND NAME----------------

$ext = pathinfo($_FILES['photo']['name'] , PATHINFO_EXTENSION);



$filename = 'img/'.$firstname.$lastname.time().'.'.$ext;
echo '<br>'.$filename;



// ------------------------- VARIFY IF IMAGE IS VALID ----------------------------
$validImage = true;
// check to see if image is missgint
if($_FILES['photo']['size'] == 0){
	echo "OOPS! -- You did not select an image";
	$validImage = false;
	
};
	
	
if($_FILES['photo']['size'] > 204800){
	
	echo "OOPS ---  that image size is larger than 200KB";
	$validImage = false;
	
};
// check file type
if($_FILES['photo']['type'] == 'image/gif'||$_FILES['photo']['type'] == 'image/jpg'||$_FILES['photo']['type'] == 'image/jpeg'||$_FILES['photo']['type'] == 'image/png'||$_FILES['photo']['type'] == 'image/pjpeg'){
	
	
	// that must be a proper image format
	
	
} else{
	// tell user not correct
	echo "That was not a valid image format";
	$validImage = false;
};

if($validImage == true){
	//upload file
	
	$tmp_name = $_FILES['photo']['tmp_name'];
	
	move_uploaded_file($tmp_name, $filename);
	
	@unlink ($_FILES['photo']['tmp_name']);
	require_once('variables.php');
	
	$dbconnect = mysqli_connect(HOST, USER , PASSWORD, DB_NAME) or die('connection lost');
	
	$query = "INSERT INTO employee_info ( firstname, lastname, area, phone, description, photo) VALUES ('$firstname','$lastname','$area','$phone','$description','$filename')";
	
	$result = mysqli_query($dbconnect, $query) or die('this is not working');
	
}
else{
	// try again
	echo '<a href="add.php">Please Try Again!<a>';
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<a href="add.php">BACK</a>
<?php echo "<img src='".$filename."' alt='photo'/>";?>
</body>
</html>



