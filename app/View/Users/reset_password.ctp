<div class="reset-password form">
	<?php
		echo $this -> Form -> create('User', array('controller' => 'users', 'action' => 'resetPassword'));
	?>
	<fieldset class="centrar">
		<legend>
			<?php __('Reset password request', true);?>
		</legend>
		<p>
			<?php __('Enter your email to request a new password.', true);?>
		</p>
		<div class="input text">
			<label for='email'><?php echo __('Email:');?></label>
			<input type="email" class="input" id='email' name='data[User][email]' required="required" />
		</div>
		<?php
		echo $this -> Form -> end(__('Request new password', true));
		?>
	</fieldset>
	<?php
		echo $this -> Session -> flash();
	?>
</div>
