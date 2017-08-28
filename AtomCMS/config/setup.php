<?php
	//setup file:
	
	error_reporting(0);

	#Database connection
	include('config/connection.php');

	#Constants
	define('D_TEMPLATE', 'templates');

	#functions
	include('functions/sandbox.php');
	include('functions/data.php');
	include('functions/template.php');
	
	#site setup
	$path = get_path();

	$site_title = "AtomCMS";

	if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
			//$path['call_parts'][0] = 'home';
			header('Location: home');
		} 

	#page setup
	$page = data_page($dbc, $path['call_parts'][0]);
?>