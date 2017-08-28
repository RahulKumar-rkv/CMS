<?php
	
	function nav_main($dbc, $path){

		$query = "SELECT * FROM pages";
	  	$res = mysqli_query($dbc,$query);

  		while($nav=mysqli_fetch_assoc($res)) { ?>
  			<li<?php selected($path['call_parts'][0], $nav['slug'], ' class="active"'); ?>><a href="<?php echo $nav['slug']; ?>"><?php echo $nav['label']; ?></a></li>
	  	<?php }
	}
?>