<div class='login'>
	<?php echo $this -> Form -> create('User',array('action'=>'login'));?>
	<?php echo $this -> Form -> input('email',array('type'=>'email', 'required'=>'required')); ?>
	<?php echo $this -> Form -> input('password',array('required'=>'required')); ?>
	<?php echo $this -> Form -> submit(__('login')); ?>
	<?php echo $this -> Form -> end()?>
</div>

<?php 
	echo $this -> element('ajax-login');
?>