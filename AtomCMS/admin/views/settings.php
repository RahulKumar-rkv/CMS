<h1>Site Settings</h1>

<div class="container">
	<div class="row">		
		<div class="col-md-12">
		
			<?php if(isset($message)) { echo $message; } ?>	
			<?php
				$query = "SELECT * FROM settings ORDER BY id ASC";
				$res = mysqli_query($dbc, $query);
				while($opened = mysqli_fetch_assoc($res)) { ?>
						<form class="form-inline" action="index.php?page=settings&id=<?php echo $opened['id']; ?>" method="post" role="form">
							<div class="form-group">
						    	<label class="sr-only" for="id">ID :</label>
						    	<input type="text" class="form-control" id="id" name="id" value="<?php echo $opened['id']; ?>" placeholder="id-name" />				    	
							</div>
							 
							<div class="form-group">
						    	<label class="sr-only" for="label">Label :</label>
						    	<input type="text" class="form-control" id="last" name="label" value="<?php echo $opened['label']; ?>" placeholder="Label" />				    	
							</div>
							
							<div class="form-group">
						    	<label class="sr-only" for="value">Value :</label>
						    	<input type="text" class="form-control" id="value" name="value" value="<?php echo $opened['value']; ?>" placeholder="Value" />				    	
							</div>
							
							<button type="submit" class="btn btn-default">Save</button>
							<input type="hidden" name="submitted" value="1" />								
							<input type="hidden" name="openedid" value="<?php echo $opened['id']; ?>" />											
						</form><br/>
			<?php } ?>
			
		</div>
	</div>
</div>
