<?php
	//start the session
	session_start();
	
	//redirect to login page if user is not logged in
	if(!isset($_SESSION['loggedin'])){
		header('Location: index.html');
		exit;
	}
	
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
	
	//to get password and email information, we access the database
	$stmt = $con->prepare('SELECT user_password, user_email, user_fn, user_ln FROM users WHERE id = ?');
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($password, $email, $first_name, $last_name);
	$stmt->fetch();
	$stmt->close();
?>

<!DOCTYPE html>
<html lang="en-US">
	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
			x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
	</script>
	<!--scale page based on size of device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--style link for hamburger menu-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<head>
		<title>Yeehaws &amp Pokes | Profile</title>
		<link href="styles/style.css" type="text/css" rel="stylesheet"/>
	</head>
	
	<nav>
	<div class="topnav" id="myTopnav">
		<a href="home.php">Home</a>
		<a href="books.php">Books</a>
		<a href="electronics.php">Electronics</a>
		<a href="office.php">Office Supplies</a>
		<a href="homedecor.php">Home Decor</a>
		<a href="misc.php">Miscellaneous</a>
		<a href="profile.php">Profile</a>
		<a href="listItem.html">Sell</a>
		<a href="logout.php">Logout</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	</nav>
	
	<body>
		<div class="header">
			<h1>Yeehaws &amp Pokes</h1>
			<h2>Account Settings</h2>
		</div>
		<div class="listFormContainer">
			<form class="list">
				<fieldset>
					<div>
						<!--inserting data from database/session-->
						<h3>First Name:</h3>
						<p><?=$first_name?></p>
						
						<!--inserting data from database/session-->
						<h3>Last Name:</h3>
						<p><?=$last_name?></p>
						
						<!--inserting data from database/session-->
						<h3>Username:</h3>
						<p><?=$_SESSION['name']?></p>
						
						<!--inserting data from database/session-->
						<h3>Email:</h3>
						<p><?=$email?></p>
					</div>
					<br/>
				</fieldset>
			</form>
		</div>
	</body>
	<footer>
	</footer>
</html>
