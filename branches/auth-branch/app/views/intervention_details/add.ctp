<div class="interventionDetails form">
<?php echo $this->Form->create('InterventionDetail');?>
	<fieldset>
		<legend><?php __('Add Intervention Detail'); ?></legend>
	<?php
		echo $this->Form->input('intervention_id');
		echo $this->Form->input('week');
		echo $this->Form->input('date');
		echo $this->Form->input('score');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Intervention Details', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add')); ?> </li>
	</ul>
</div>