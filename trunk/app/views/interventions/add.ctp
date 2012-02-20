<div class="interventions form">
<?php echo $this->Form->create('Intervention');?>
	<fieldset>
		<legend><?php __('Add Intervention'); ?></legend>
	<?php
		echo $this->Form->input('student_id');
		echo $this->Form->input('skill_id');
		echo $this->Form->input('start_date',array('type' => 'text', 'class' => 'datepicker'));
		echo $this->Form->input('end_date',array('type' => 'text', 'class' => 'datepicker'));
		echo $this->Form->input('completed');
		echo $this->Form->input('instructor_id');
		echo $this->Form->input('goal_score');
		echo $this->Form->input('goal_text');
		echo $this->Form->input('notes');
		echo $this->Form->input('baseline');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Skills', true), array('controller' => 'skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructors', true), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
		
	</ul>
</div>