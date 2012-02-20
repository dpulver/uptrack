<?php
echo $this->Session->flash('auth');
echo $this->Html->image('spmlogo.png', array('alt' => 'Uptrack'));
echo $this->Form->create('Instructor', array('action' => 'login'));
echo $this->Form->inputs(array(
	'legend' => __('Login', true),
	'username',
	'password'
));
echo $this->Form->end('Login');
?>
