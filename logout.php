<?php
	session_start();
	session_destroy();
	
	//redirect the user to the login page
	header('Location: index.html');
?>