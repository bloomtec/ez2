<div class='login'>
	<?php echo $this -> Form -> create('User', array('action' => 'register'));?>
	<?php echo $this -> Form -> input('email', array('label' => __('Email', true), 'type' => 'email', 'required' => 'required'));?>
	<?php echo $this -> Form -> input('confirm_email', array('label' => __('Confirm Email', true), 'type' => 'email', 'required' => 'required', 'data-equals' => 'data[User][email]'));?>
	<?php echo $this -> Form -> input('password', array('label' => __('Password', true), 'required' => 'required'));?>
	<?php echo $this -> Form -> input('confirm_password', array('label' => __('Confirm Password', true), 'type' => 'password', 'required' => 'required', 'data-equals' => 'data[User][password]'));?>
	<?php echo $this -> Form -> end(__('Register', true));?>
</div>