<div class="admin view">
<h2><?php  __('Settings');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt>School Name</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php  echo Configure::read('School.name'); ?>
			&nbsp;
		</dd>
		<dt>School Year</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>> 
			<?php echo Configure::read('School.year'); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Settings', true), array('action' => 'edit')); ?> </li>
	</ul>
</div>