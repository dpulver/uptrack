<div class="admin view">
<?php //Configure::load('settings');?>
<h2><?php  __('Admin');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt>School Name</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php Configure::read('School.name'); ?>
			&nbsp;
		</dd>
		<dt>School Year</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php Configure::read('debug'); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Students', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add')); ?> </li>
	</ul>
</div>