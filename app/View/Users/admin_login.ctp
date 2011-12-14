<!--
<div class='login'>
	<?php echo $this -> Form -> create('User', array('action' => 'login'));?>
	<legend>
		<?php __('Login', true);?>
	</legend>
	<?php echo $this -> Form -> input('email', array('type' => 'email', 'required' => 'required'));?>
	<?php echo $this -> Form -> input('password', array('required' => 'required'));?>
	<?php echo $this -> Form -> end(__('Login', true));?>
</div>
-->
<?php echo $this -> element('ajax-login');?>