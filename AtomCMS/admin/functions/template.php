<?php
	
	function nav_main($dbc,$page_id){

		$query = "SELECT * FROM pages";
	  	$res = mysqli_query($dbc,$query);

  		while($nav=mysqli_fetch_assoc($res)){ ?>
  			<li<?php if($page_id == $nav['id']) { echo ' class="active"'; } ?>>
  				<a href="?page=<?php echo $nav['id']; ?>"><?php echo $nav['label']; ?></a>
  			</li>
	  	<?php }
	}
?>