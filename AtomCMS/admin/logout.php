<?php
	
	# Start the session
	session_start();
	
	unset($_SESSION['username']); // delete the username session key
	
	header('Location: login.php'); // Redirect to login.php
	
?>