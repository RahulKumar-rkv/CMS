<?php
	# Start the session
	session_start();
	
	# Database Connection
	include('../config/connection.php');
	
	if($_POST){
		
		$query = "SELECT * FROM users WHERE email='$_POST[email]' AND password=SHA1('$_POST[password]')";
		$res = mysqli_query($dbc, $query);
		if(mysqli_num_rows($res)){
			$_SESSION['username'] = $_POST['email'];
			header('Location: index.php');
		}
		
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Admin Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include('config/css.php'); ?>
		<?php include('config/js.php'); ?>

	</head>

  <body>

  	<div id="wrap">

		<?php //include(D_TEMPLATE.'/navigation.php'); //Main Navigation bar ?>
		<div class="container">
			
			<div class="row">
				<div class="col-md-offset-4 col-md-4">
					<div class="panel panel-info">
						<div class="panel-heading">
							<strong>Login</strong>
						</div><!-- End panel heading -->
						<div class="panel-body">
							<form action="login.php" method="post" role="form">
								<div class="form-group">
							    	<label for="email">Email address</label>
							    	<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
							    	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
							    	<label for="password">Password</label>
							    	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							  	</div>
							  	<!-- <div class="form-check">
								  	<label class="form-check-label">
								    	<input type="checkbox" class="form-check-input">
								      	Check me out
								    </label>
							  	</div> -->
							  	<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div><!-- End Panel body -->
					</div><!-- End Panel -->
				</div><!-- End Col -->
			</div><!-- End Row -->
		</div><!-- End Container -->
		
	</div><!-- End Wrap -->

	<!-- <?php include(D_TEMPLATE.'/footer.php'); //Page Footer ?>
	
	<div id="console-debug">
			<pre><?php print_r($page); ?></pre>
	</div> -->

  </body>

 </html>