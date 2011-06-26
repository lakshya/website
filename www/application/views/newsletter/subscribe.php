<?php include APPPATH."views/includes/message.php"; ?>
<?php include APPPATH."views/includes/errors.php"; ?>
<form method="post">
<p>
	<?php echo form::label('email', 'Email Address')?>
	<?php echo form::input('email')?>
	<?php echo form::submit('submit', 'Subscribe')?>
</p>
</form>