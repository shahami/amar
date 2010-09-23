
<?php echo form_open(base_url() .index_page(). '/user/login')?>

<?php if($this->session->flashdata('flashError')){ ?>
<div class='flashError'>
	<?php echo $this->session->flashdata('flashError') ?>
</div>
<?php } ?>

<fieldset>
	<legend>Login Form</legend>
	<ul>
		<li>
			<label>Email</label>
			<?php echo form_input('userEmail', set_value('userEmail')) ?>
			<?php echo form_error('userEmail') ?>
		</li>
		<li>
			<label>Password</label>
			<?php echo form_password('userPassword')?>
			<?php echo form_error('userPassword') ?>
		</li>
		<li>
			<?php echo form_submit('', 'Login') ?>
		</li>
	</ul>
</fieldset>
<?php echo form_close()?>

