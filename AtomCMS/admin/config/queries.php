<?php
	
	switch ($page) {
		case 'dashboard' :
			
			break;
			
		case 'pages' :
			
			if(isset($_POST['submitted']) == 1){
			
				$title = mysqli_real_escape_string($dbc, $_POST['title']);
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$header = mysqli_real_escape_string($dbc, $_POST['header']);
				$body = mysqli_real_escape_string($dbc, $_POST['body']);
			
				if(isset($_POST['id'])!='') {
					$action = 'updated';
					$query = "UPDATE pages SET user = $_POST[user], slug='$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
				} else {
					$action = 'added';
					$query = "INSERT INTO pages (user, slug, title, label, header, body) VALUES($_POST[user], '$_POST[slug]', '$title', '$label', '$header', '$body')";
				}
			
				$res = mysqli_query($dbc, $query);
			
				if($res){
					$message = "<div class='alert alert-success' role='alert'>Page ".$action." successfully </div>";
				} else {
					$message = "<div class='alert alert-danger' role='alert'>Page could not be ".$action." because : ".mysqli_errno($dbc)."</div>";
				}
			}
			if(isset($_GET['id'])){	$opened = data_page($dbc, $_GET['id']); }
					
			break;
			
		case 'users' :
			
			if(isset($_POST['submitted']) == 1){
			
				$first = mysqli_real_escape_string($dbc, $_POST['first']);
				$last = mysqli_real_escape_string($dbc, $_POST['last']);
				
				if($_POST['password'] != ''){
					
					if($_POST['password'] == $_POST['passwordv']) {
						$password = "password = SHA1('$_POST[password]'),";
						$verify = true;
					} else {
						$verify = false;
					}	
					
				} else {
					
					$verify = false;
					
				}
			
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$query = "UPDATE users SET first = '$first', last='$last', email='$_POST[email]', $password status = '$_POST[status]' WHERE id = $_GET[id]";
					$res = mysqli_query($dbc, $query);
					
				} else {
					
					$action = 'added';					
					$query = "INSERT INTO users (first, last, email, password, status) VALUES('$first', '$last', '$_POST[email]', SHA1('$_POST[password]'), '$_POST[status]')";
					if($verify == true) {
						$res = mysqli_query($dbc, $query);
					}
				}
				
				if($res){
					$message = "<div class='alert alert-success' role='alert'>User ".$action." successfully </div>";
				} else {
					$message = "<div class='alert alert-danger' role='alert'>User could not be ".$action." because : ".mysqli_errno($dbc)."</div>";
					if($verify == false) {
						$message = "<div class='alert alert-danger' role='alert'>Password fields empty and/or do not match</div><div class='alert alert-warning' role='alert'>Query : ".$query."</div>";
					}
				}
			}
			if(isset($_GET['id'])){	$opened = data_user($dbc, $_GET['id']); }
						
			break;
			
			case 'settings' :
					
				if(isset($_POST['submitted']) == 1){
						
					$label = mysqli_real_escape_string($dbc, $_POST['label']);
					$value = mysqli_real_escape_string($dbc, $_POST['value']);

						
					if(isset($_POST['id']) != '') {
							
						$action = 'updated';
						$query = "UPDATE settings SET id = '$_POST[id]', label = '$label', value='$value' WHERE id = '$_POST[openedid]'";
						$res = mysqli_query($dbc, $query);
							
					}
			
					if($res){
						$message = "<div class='alert alert-success' role='alert'>Setting was ".$action." successfully </div>";
					} else {
						$message = "<div class='alert alert-danger' role='alert'>Setting could not be ".$action." because : ".mysqli_errno($dbc)."</div>";						
					}
				}
			
				break;
			
		default:
			
			break;
	}
						
	
	
?>