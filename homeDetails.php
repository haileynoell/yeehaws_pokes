<?php
	//start session for logged in user
	session_start();

	//redirect to login page if user is not logged in
	if(!isset($_SESSION['loggedin'])){
		header('Location: index.html');
		exit;
	}
	
	if(isset($_GET['ID'])) {
		require_once 'connect.php';
		$ID = mysqli_real_escape_string($dbc, $_GET['ID']);
		
		$sql = "SELECT * FROM home WHERE id='$ID' ";
		$result = mysqli_query($dbc, $sql) or die("Bad Query: $sql");
		$row = mysqli_fetch_array($result);
	}
?>
<!--Yeehaws & Pokes-->
<!--Last edited: 04(April)/21/2021-->
<!--Developed by Hailey Hanson, Brandon Hawkins-->

<!--Product page-->

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
		<div class="header">
			<h1>Yeehaws &amp Pokes</h1>
		</div>
		<main class="container2">
			<!--Left Column / Item Image-->
			<div class="left-column">
			<img src="<?php echo $row['image']?>">
			</div>

			<!--Right Column-->
			<div class="right-column">
				<!--description-->
				<div class="product-description">
				<span><?php echo $row['itemCondition'] ?></span>
				<h2><?php echo $row['title'] ?></h2>
				<p><?php echo $row['description'] ?></p>
				<footer>$<?php echo $row['price'] ?> from <?php echo $row['postedBy'] ?>@mcneese.edu</footer>
				
				</div>
			</div>
		</main>
	</body>
	
	<footer>
		<h3>Yeehaws & Pokes</h3>
		&copy 2021 Yeehaws & Pokes
	</footer>
</html>
