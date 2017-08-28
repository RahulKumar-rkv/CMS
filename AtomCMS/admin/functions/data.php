<?php
	
	function data_user($dbc, $id) {
		
		if(is_numeric($id)) {
			$cond = "WHERE id='$id'";
		} else {
			$cond = "WHERE email='$id'";
		}
		$query = "SELECT * FROM users $cond";
		$res = mysqli_query($dbc, $query);
		$data = mysqli_fetch_assoc($res);
		
		$data['fullname'] = $data['first'].' '.$data['last'];
		
		return $data;
	}
	
	
	function data_page($dbc, $id){
		$sql = "SELECT * FROM pages WHERE id='$id'";
		$res = mysqli_query($dbc, $sql);
		$data = mysqli_fetch_assoc($res);

		$data['body_nohtml'] = strip_tags($data['body']);
		if($data['body'] == $data['body_nohtml']) {
			$data['body_formatted'] = '<p>'.$data['body'].'</p>';
		} else {
			$data['body_formatted'] = $data['body'];
		}

		return $data;
	}

?>