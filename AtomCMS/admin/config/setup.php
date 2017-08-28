<?php
	//setup file:
	
	error_reporting(0);
	
	#Database connection
	include('../config/connection.php');

	#Constants
	define('D_TEMPLATE', 'templates');

	#functions
	include('functions/data.php');
	include('functions/template.php');
	include('functions/sandbox.php');

	$site_title = "AtomCMS";

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = 'dashboard';
	}

	#page setup
	include('config/queries.php');
	
	#user setup
	$user = data_user($dbc, $_SESSION['username']);
	
?>