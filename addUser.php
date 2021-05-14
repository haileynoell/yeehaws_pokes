<?php
#This line attempts to connect to MySQL server connection
$link = mysqli_connect("den1.mysql6.gear.host", "yeehawspokes", "Oz6of~h?O8U1", "yeehawspokes");

#Check if connection fails or succeeds
if($link == false){
	die("ERROR: Could not connect to database server. " .mysqli_connect_error());
}

#Print host information output to screen
#echo "Connected Successfully. Host info: " .mysqli_get_host_info($link);

#Getting data from HTML signup form
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);

#Insert values from signup form into database using query execution
$sql = "INSERT INTO users (user_fn, user_ln, user_username, user_password, user_email)
		VALUES ('$first_name', '$last_name', '$username', '$password', '$email')";
		
if(mysqli_query($link, $sql)){
	echo "New User Successfully Added.";
} else{
	echo "ERROR: Not able to execute $sql." .mysqli_error($link);
}

#Close the database server link
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="styles/styles.css" type="text/css" rel="stylesheet"/>
	</head>
	<!--will need to change link to index.html-->
	<body>
		<a href="index.html">Account has been created. Click to return to the login page.</a>
	</body>
</html>