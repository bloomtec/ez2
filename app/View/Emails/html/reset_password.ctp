<div>
	<p>
		<?php echo __('This email was sent from :: ', true) . Configure::read('site_name'); ?>
	</p>
	<p>
		<?php echo __('You have solicited this mail after not remembering your site password.', true); ?><br />
		<?php echo __('You can access the site using your username and the given password.', true); ?><br />
		<?php echo __('Username :: ', true) . $username; ?><br />
		<?php echo __('Password :: ', true) . $password; ?>
	</p>
	<p>
		<?php echo __('Remember to change your password to one that you can easily remember.', true); ?>
	</p>
</div>