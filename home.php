<?php
	//start session for logged in user
	session_start();

	//if user is not logged in redirect them to the login page
	if(!isset($_SESSION['loggedin'])){
		header('Location: index.html'); 
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<script>
		function hamburger() {
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
		<title>Yeehaws &amp Pokes | Shop</title>
		<link href="styles/style.css" type="text/css" rel="stylesheet"/>
	</head>
	
	<!-- Navigation bar -->
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
			<a href="javascript:void(0);" class="icon" onclick="hamburger()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
	</nav>
	
	<body>
		<div class="homepage">
			<div class="header">
				<h1>Yeehaws &amp Pokes</h1>
			</div>
			
			<div class="home-content">
				<div class="container">
					<a href="books.php"><img src="images/bookNoBackground.png" alt="Books & Textbooks" style="width:100%;" title="Books"></a>
					<div class="centered"><h2>Books</h2></div>
				</div>
				<div class="container">
					<a href="electronics.php"><img src="images/tabletNoBackground.png" alt="Electronics" style="width:100%;" title="Electronics"></a>
					<div class="centered"><h2>Electronics</h2></div>
				</div>
				<div class="container">
					<a href="office.php"><img src="images/clipboardNoBackground.png" alt="Office Supplies" style="width:100%;" title="Office Supplies"></a>
					<div class="centered"><h2>Office Supplies</h2></div>
				</div>
				<div class="container">
					<a href="homedecor.php"><img src="images/shelfNoBackground.png" alt="Home & Decor" style="width:100%;" title="Home Decor"></a>
					<div class="centered"><h2>Home Decor</h2></div>
				</div>
				<div class="container">
					<a href="misc.php"><img src="images/miscNoBackground.png" alt="Miscellaneous" style="width:100%;" title="Miscellaneous"></a>
					<div class="centered"><h2>Miscellaneous</h2></div>
				</div>
			</div>
		</div>
	</body>
	

	
	<footer>
		<h3>Yeehaws & Pokes</h3>
		&copy 2021 Yeehaws & Pokes
	</footer>
</html>
