<div class="interventionDetails view">
<h2><?php  __('Intervention Detail');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $interventionDetail['InterventionDetail']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Intervention'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($interventionDetail['Intervention']['id'], array('controller' => 'interventions', 'action' => 'view', $interventionDetail['Intervention']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Week'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $interventionDetail['InterventionDetail']['week']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $interventionDetail['InterventionDetail']['date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Score'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $interventionDetail['InterventionDetail']['score']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Intervention Detail', true), array('action' => 'edit', $interventionDetail['InterventionDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Intervention Detail', true), array('action' => 'delete', $interventionDetail['InterventionDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $interventionDetail['InterventionDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Intervention Details', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention Detail', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add')); ?> </li>
	</ul>
</div>
