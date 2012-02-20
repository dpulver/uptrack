<h3><?php __('Uptrack Student Progress Monitoring'); ?></h3>
<p>
<?php __('Student Progress Tracking For Teachers.'); ?>
</p>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<ul><li><?php __('Show list of students'); ?></li></ul></li>
		<li><?php echo $this->Html->link(__('List Skills', true), array('controller' => 'skills', 'action' => 'index')); ?> </li>
	  <ul><li><?php __('Show list of skills'); ?></li></ul></li>
</ul>
</div>