
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->css('style3');
	?>
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>