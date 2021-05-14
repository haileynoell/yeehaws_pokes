<?php
	//start session for logged in user
	session_start();

	//redirect to login page if user is not logged in
	if(!isset($_SESSION['loggedin'])){
		header('Location: index.html');
		exit;
	}
?>

<!DOCTYPE html>
<html>
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
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
	</nav>
	
	<body>
		<div class="header">
			<h1>Yeehaws &amp Pokes</h1>
			<h2>Electronics</h2>
		</div>
	
		<div class="books-content">
			<?php 
			     require 'connect.php';

			     $sql = "SELECT * FROM electronics";
			     $result = mysqli_query($dbc,$sql) or die("Bad query: $sql");

			     echo "<table border='1'>";
		   	     echo "<tr><td>Title</td></tr>";

		     	     while($row = mysqli_fetch_assoc($result)) {
					  echo "<tr><td><a href='electronicDetails.php?ID={$row['id']}'>{$row['title']}</a></td></tr>";
		   	     }

		     	     echo "</table>";
			?>
		</div>
	</body>
</html>
