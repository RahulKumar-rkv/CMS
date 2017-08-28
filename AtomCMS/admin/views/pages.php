	<h1>Admin Dashboard</h1>
	<div class="container-fluid">
		<div class="row">		
			<div class="col-md-3">					
				
				<div class="list-group">
					<a class="list-group-item" href="?page=pages">
						<h4 class="list-group-item-heading"><i class="fa fa-plus"></i>&nbsp;New Page</h4>
					</a>	
					<?php
						$query = "SELECT * FROM pages ORDER BY title ASC";
						$res = mysqli_query($dbc, $query);
						while($list = mysqli_fetch_assoc($res)) {
							$blurb = substr(strip_tags($list['body']), 0, 95);
					?>
							<div id="page_<?php echo $list['id']; ?>" class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>">
								<h4 class="list-group-item-heading"><?php echo $list['title']; ?></h4>
								<span class="pull-right">&nbsp;&nbsp;
									<a href="#" id="del_<?php echo $list['id']; ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
									<a href="index.php?page=pages&id=<?php echo $list['id']; ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
								</span>
								<p class="list-group-item-text text-justify"><?php echo $blurb; ?></p>
							</div>
					<?php }
					?>
				</div>
			</div>
			<div class="col-md-9">	
				<?php if(isset($message)) { echo $message; } ?>
				
				<form action="index.php?page=pages&id=<?php echo $opened['id']; ?>" method="post" role="form">
					<div class="form-group">
				    	<label for="title">Title :</label>
				    	<input type="text" class="form-control" id="title" name="title" value="<?php echo $opened['title']; ?>" placeholder="Enter Page Title" />				    	
					</div>
					
					<div class="form-group">
				    	<label for="user">User :</label>
				    	<select class="form-control" name="user" id="user">
				    		<option value="0">No User</option>
				    		<?php
								$query = "SELECT id FROM users ORDER BY  first ASC";
								$res = mysqli_query($dbc, $query);
								while($user_list = mysqli_fetch_assoc($res)) {
									$user_data = data_user($dbc, $user_list['id']);
							?>
									<option value="<?php echo $user_data['id']; ?>"
									 <?php
									 	if(isset($_GET['id'])) {
									 		selected($user_data['id'], $opened['user'], 'selected');
									 	} else {
									 		selected($user_data['id'], $user['id'], 'selected');
									 	}
									 	
									 ?>><?php echo $user_data['fullname']; ?></option>
							<?php }
								
				    		?>					    		
				    	</select>			    	
					</div>
					
					<div class="form-group">
				    	<label for="slug">Slug :</label>
				    	<input type="text" class="form-control" id="slug" name="slug" value="<?php echo $opened['slug']; ?>" placeholder="Enter Page Slug" />				    	
					</div>
					
					<div class="form-group">
				    	<label for="label">Label :</label>
				    	<input type="text" class="form-control" id="label" name="label" value="<?php echo $opened['label']; ?>" placeholder="Enter Page Label" />				    	
					</div>
					
					<div class="form-group">
				    	<label for="header">Header :</label>
				    	<input type="text" class="form-control" id="title" name="header" value="<?php echo $opened['header']; ?>" placeholder="Enter Page Header" />				    	
					</div>
					
					<div class="form-group">
				    	<label for="body">Content :</label>
				    	<textarea class="form-control editor" id="body" name="body" rows="10" placeholder="Type Your Page Content here.." ><?php echo $opened['body']; ?></textarea>				    	
					</div>
					
					<button type="submit" class="btn btn-default">Save</button>
					<input type="hidden" name="submitted" value="1" />
					<?php if(isset($opened['id'])) { ?>
						<input type="hidden" name="id" value="<?php echo $opened['id']; ?>" />
					<?php }?>		
				</form>				
			</div>
		</div>
	</div>
