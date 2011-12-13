<div class='ajax-login'>
	<?php echo $this -> Form -> create('User',array('action'=>'login'));?>
	<?php echo $this -> Form -> input('email',array('type'=>'email', 'required'=>'required')); ?>
	<?php echo $this -> Form -> input('password',array('required'=>'required')); ?>
	<?php echo $this -> Form -> submit(__('login')); ?>
	<span class='login-message'> mensaje de login</span>
	<?php echo $this -> Form -> end()?>
</div>