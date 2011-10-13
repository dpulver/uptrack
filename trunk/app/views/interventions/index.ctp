<div class="interventions index">
	<h2><?php __('Interventions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('student_id');?></th>
			<th><?php echo $this->Paginator->sort('skill_id');?></th>
			<th><?php echo $this->Paginator->sort('start_date');?></th>
			<th><?php echo $this->Paginator->sort('end_date');?></th>
			<th><?php echo $this->Paginator->sort('completed');?></th>
			<th><?php echo $this->Paginator->sort('instructor_id');?></th>
			<th><?php echo $this->Paginator->sort('goal_score');?></th>
			<th><?php echo $this->Paginator->sort('goal_text');?></th>
			<th><?php echo $this->Paginator->sort('notes');?></th>
			<th><?php echo $this->Paginator->sort('baseline');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($interventions as $intervention):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $intervention['Intervention']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($intervention['Student']['id'], array('controller' => 'students', 'action' => 'view', $intervention['Student']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($intervention['Skill']['name'], array('controller' => 'skills', 'action' => 'view', $intervention['Skill']['id'])); ?>
		</td>
		<td><?php echo $intervention['Intervention']['start_date']; ?>&nbsp;</td>
		<td><?php echo $intervention['Intervention']['end_date']; ?>&nbsp;</td>
		<td><?php echo $intervention['Intervention']['completed']? 'Yes' : 'No'; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($intervention['Instructor']['username'], array('controller' => 'instructors', 'action' => 'view', $intervention['Instructor']['id'])); ?>
		</td>
		<td><?php echo $intervention['Intervention']['goal_score']; ?>&nbsp;</td>
		<td><?php echo $intervention['Intervention']['goal_text']; ?>&nbsp;</td>
		<td><?php echo $intervention['Intervention']['notes']; ?>&nbsp;</td>
		<td><?php echo $intervention['Intervention']['baseline']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $intervention['Intervention']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $intervention['Intervention']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $intervention['Intervention']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $intervention['Intervention']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student', true), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Skills', true), array('controller' => 'skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Skill', true), array('controller' => 'skills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructors', true), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instructor', true), array('controller' => 'instructors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Intervention Details', true), array('controller' => 'intervention_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention Detail', true), array('controller' => 'intervention_details', 'action' => 'add')); ?> </li>
	</ul>
</div>