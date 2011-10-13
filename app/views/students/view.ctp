<div class="students view">
<h2><?php  __('Student');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $student['Student']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $student['Student']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $student['Student']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Teacher'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $student['Student']['teacher']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $student['Student']['grade']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $student['Student']['id_number']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student', true), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Student', true), array('action' => 'delete', $student['Student']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Interventions');?></h3>
	<?php if (!empty($student['Intervention'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Student Id'); ?></th>
		<th><?php __('Skill Id'); ?></th>
		<th><?php __('Start Date'); ?></th>
		<th><?php __('End Date'); ?></th>
		<th><?php __('Completed'); ?></th>
		<th><?php __('Instructor Id'); ?></th>
		<th><?php __('Goal Score'); ?></th>
		<th><?php __('Goal Text'); ?></th>
		<th><?php __('Notes'); ?></th>
		<th><?php __('Baseline'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($student['Intervention'] as $intervention):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $intervention['id'];?></td>
			<td><?php echo $intervention['student_id'];?></td>
			<td><?php echo $intervention['skill_id'];?></td>
			<td><?php echo $intervention['start_date'];?></td>
			<td><?php echo $intervention['end_date'];?></td>
			<td><?php echo $intervention['completed'];?></td>
			<td><?php echo $intervention['instructor_id'];?></td>
			<td><?php echo $intervention['goal_score'];?></td>
			<td><?php echo $intervention['goal_text'];?></td>
			<td><?php echo $intervention['notes'];?></td>
			<td><?php echo $intervention['baseline'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'interventions', 'action' => 'view', $intervention['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'interventions', 'action' => 'edit', $intervention['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'interventions', 'action' => 'delete', $intervention['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $intervention['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
