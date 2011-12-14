<?php echo $this -> Form -> create();?>
<?php echo '<fieldset>';?>
<?php echo $this -> Form -> input('validation_code', array('value' => ''));?>
<?php echo '</fieldset>';?>
<?php echo $this -> Session -> flash();?>
<?php echo $this -> Form -> end(__('Validate Email', true));?>