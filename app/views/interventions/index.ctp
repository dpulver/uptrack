<div class="interventions index">
	<h2><?php __('Interventions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('student');?></th>
			<th><?php echo $this->Paginator->sort('skill_id');?></th>
			<th><?php echo $this->Paginator->sort('start_date');?></th>
			<th><?php echo $this->Paginator->sort('end_date');?></th>
			<th><?php echo $this->Paginator->sort('completed');?></th>
			<th><?php echo $this->Paginator->sort('instructor');?></th>
			<th><?php echo $this->Paginator->sort('goal_score');?></th>
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
		<td>
			<?php echo $this->Html->link($intervention['Student']['full_name'], array('controller' => 'students', 'action' => 'view', $intervention['Student']['id'])); ?>
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
		<td><?php echo $intervention['Intervention']['baseline']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $intervention['Intervention']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $intervention['Intervention']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions','action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Skills', true), array('controller' => 'skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructors', true), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
		<br>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('action' => 'add')); ?></li>
	</ul>
</div>