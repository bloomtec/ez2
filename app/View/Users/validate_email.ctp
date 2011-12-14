<div>
	<?php echo $this -> Session -> flash();?>
</div>
<?php
	echo $this -> Form -> create();
	echo '<fieldset>';
	echo $this -> Form -> input('validation_code', array('value' => ''));
	echo '</fieldset>';
	echo $this -> Form -> end(__('Validate Email', true));
?>