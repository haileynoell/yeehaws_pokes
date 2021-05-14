<?php
//start the session
//allows for preservation of account details on server to be used later
session_start();

//change this information to your connection information
$DATABASE_HOST = 'den1.mysql6.gear.host';
$DATABASE_USER = 'yeehawspokes';
$DATABASE_PASS = 'Oz6of~h?O8U1';
$DATABASE_NAME = 'yeehawspokes';

//try to connect with information from above section of code
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if(mysqli_connect_errno()){
	//if there's an error with the connection then stop the script and display the error
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//check if data from login form was submitted
//isset() checks to see if data exists in database table
if(!isset($_POST['username'], $_POST['password'])){
	//execute if it can not get the data that should've been sent
	exit('Please use username and password fields to login.');
}

//prepare sql to prevent SQL injection
if($stmt = $con->prepare('SELECT id, user_password FROM users WHERE user_username = ?')){
	//bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	
	//store result to check if account exists in the database
	$stmt->store_result();
	
	if($stmt->num_rows > 0){
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		
		//account exists so now verify the password
		if ($_POST['password'] === $password){
			//password is verified, user is logged in
			//sessions are created, so we know user is logged in
			//these sessions remember the data on the server in this session
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			//sends user to home page if correct credentials are entered
			header('Location: home.php');
		} 
		else{
			//if password is incorrect
			echo 'Incorrect username and/or password.';
		}
	}
	else{
		//the username is incorrect
		echo 'User does not exist.';
	}
	
	$stmt->close();
}
?>