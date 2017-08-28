<?php include('config/setup.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<title><?php echo $page['title'].' | '.$site_title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include('config/css.php'); ?>
		<?php include('config/js.php'); ?>

	</head>

  <body>

  	<div id="wrap">

		<?php include(D_TEMPLATE.'/navigation.php'); //Main Navigation bar ?>

		<div class="container">
			<h1><?php echo $page['header']; ?></h1>
			<?php echo $page['body_formatted']; ?>
		</div>
	</div><!-- End Wrap -->

	<?php include(D_TEMPLATE.'/footer.php'); //Page Footer ?>
	
	<div id="console-debug">
			<pre><?php print_r($page); ?></pre>
			<br/>
			<pre><?php print_r($path); ?></pre>
	</div>

  </body>

 </html>