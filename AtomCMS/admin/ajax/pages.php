<?php

	include('../../config/connection.php');
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM pages WHERE id = $id";
	$res = mysqli_query($dbc, $query);
	
	if($res) {
		echo 'Page Deleted';		
	} else {
		echo 'There was an error...<br/>';
		echo $query.'<br/>';
		echo mysqli_error($dbc);
	}
	
?>