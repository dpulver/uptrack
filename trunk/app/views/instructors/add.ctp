<div class="instructors form">
<?php echo $this->Form->create('Instructor');?>
	<fieldset>
		<legend><?php __('Add Instructor'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('group_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Instructors', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add')); ?> </li>
	</ul>
</div>