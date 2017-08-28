<?php if(isset($opened['id'])) { ?>
<script>

	$(document).ready(function(){
		Dropzone.autoDiscover = false;

		var myDropzone = new Dropzone("#avatar-dropzone");

		myDropzone.on("success", function(file) {
			$("#avatar").load("../ajax/avatar.php?id=<?php echo $opened['id']; ?>");
		});
		
	});

</script>
<?php } ?>


<h1>User Manager</h1>
<div class="container">
	<div class="row">		
		<div class="col-md-3">					
			
			<div class="list-group">
				<a class="list-group-item" href="?page=users">
					<h4 class="list-group-item-heading"><i class="fa fa-plus"></i>&nbsp;New User</h4>
				</a>	
				<?php
					$query = "SELECT * FROM users ORDER BY first ASC";
					$res = mysqli_query($dbc, $query);
					while($list = mysqli_fetch_assoc($res)) {
						$list = data_user($dbc, $list['id']);
						/* $blurb = substr(strip_tags($list['body']), 0, 95); */
				?>
						<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>" href="index.php?page=users&id=<?php echo $list['id']; ?>">
							<h4 class="list-group-item-heading"><?php echo $list['fullname']; ?></h4>
							<!-- p class="list-group-item-text"><?php //echo $blurb; ?></p-->
						</a>							
				<?php }
				?>
			</div>
		</div>
		<div class="col-md-9">	
			<?php if(isset($message)) { echo $message; } ?>
			
			<form action="index.php?page=users&id=<?php echo $opened['id']; ?>" method="post" role="form">
				
				<?php if($opened['avatar'] != '') { ?>
					<div id="avatar">
						<img src="../uploads/<?php echo $opened['avatar']; ?>" />
					</div>					
				<?php } ?>
				
				<div class="form-group">
			    	<label for="first">First :</label>
			    	<input type="text" class="form-control" id="first" name="first" value="<?php echo $opened['first']; ?>" placeholder="Enter First Name" />				    	
				</div>
				
				<div class="form-group">
			    	<label for="last">Last :</label>
			    	<input type="text" class="form-control" id="last" name="last" value="<?php echo $opened['last']; ?>" placeholder="Enter Last Name" />				    	
				</div>
				
				<div class="form-group">
			    	<label for="email">Email :</label>
			    	<input type="email" class="form-control" id="email" name="email" value="<?php echo $opened['email']; ?>" placeholder="Enter Email Address" />				    	
				</div>
				
				<div class="form-group">
			    	<label for="status">Status :</label>
			    	<select class="form-control" name="status" id="status">
			    		<option value="0" <?php if(isset($_GET['id'])) { selected('0', $opened['status'], 'selected'); } ?>>Inactive</option>
			    		<option value="1" <?php if(isset($_GET['id'])) { selected('1', $opened['status'], 'selected'); } ?>>Active</option>					    		
			    	</select>			    	
				</div>
				
				<div class="form-group">
			    	<label for="password">Password :</label>
			    	<input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter Password" />				    	
				</div>	
				
				<div class="form-group">
			    	<label for="passwordv"> Confirm Password :</label>
			    	<input type="password" class="form-control" id="passwordv" name="passwordv" value="" placeholder="Enter Password Again" />				    	
				</div>					
				
				<button type="submit" class="btn btn-default">Save</button>
				<input type="hidden" name="submitted" value="1" />
				<?php if(isset($opened['id'])) { ?>
					<input type="hidden" name="id" value="<?php echo $opened['id']; ?>" />
				<?php }?>					
			</form>
			<?php if(isset($opened['id'])) { ?>
				<form action="uploads.php?id=<?php echo $opened['id']; ?>" class="dropzone" id="avatar-dropzone">
					<input type="file" name="file" />
				</form>
			<?php }?>			
		</div>
	</div>
</div>