<!-- bao loi -->

	<?php if (isset($errors)): ?>
	<div class="alert alert-danger">
	<?php foreach ($errors as $error): ?>
		<?php echo $error[0]; ?>
	<?php endforeach ?>
	</div>
	<?php endif ?>
<!-- bao loi -->