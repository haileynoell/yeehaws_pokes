<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$filename = $_FILES['itemImage']['name'];
$location = "upload/".$filename;

if( move_uploaded_file($_FILES['itemImage']['tmp_name'], $location)) {
	echo '<p>File uploaded</p>';
} else {
	echo '<b>Error uploading file.</b>';
	print_r($_FILES);
}


include_once 'connect.php';
if(isset($_POST['submit']))
{
	$title = $_POST['title'];
	$price = $_POST['price'];
	$condition = $_POST['condition'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$user = $_POST['user'];
	$sql = "INSERT INTO $category (title, description, itemCondition, price, image, postedBy) VALUES ('$title', '$description', '$condition', '$price', '$location', '$user')";
	if (mysqli_query($dbc, $sql)) {
		echo "New record has been added successfully! <a href='index.html'>Click for Home</a>";
	} else {
		echo "Error: " . $sql . ":-" . mysqli_error($dbc);
	}
	mysqli_close($dbc);
}

?> 
