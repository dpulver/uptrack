<div class="skills view">
<h2><?php  __('Skill');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $skill['Skill']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $skill['Skill']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Duration'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $skill['Skill']['duration']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions','action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Skills', true), array('controller' => 'skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructors', true), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
		<br>
		<li><?php echo $this->Html->link(__('Edit Skill', true), array('action' => 'edit', $skill['Skill']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Skill', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<span class="doc-controls">
			<a href="#" id="hide-completed-interventions">Show/Hide completed interventions</a>
	</span>
	<h3><?php __('Related Interventions');?></h3>
	<?php if (!empty($skill['Intervention'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Student Id'); ?></th>
		<th><?php __('Start Date'); ?></th>
		<th><?php __('End Date'); ?></th>
		<th><?php __('Completed'); ?></th>
		<th><?php __('Instructor Id'); ?></th>
		<th><?php __('Goal Score'); ?></th>
		<th><?php __('Baseline'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($skill['Intervention'] as $intervention):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			if ($intervention['completed']) {
				$class = ' class="completed"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $intervention['Student']['full_name'];?></td>
			<td><?php echo $intervention['start_date'];?></td>
			<td><?php echo $intervention['end_date'];?></td>
			<td><?php echo $intervention['completed']?'Yes' : 'No';?></td>
			<td><?php echo $intervention['Instructor']['full_name'];?></td>
			<td><?php echo $intervention['goal_score'];?></td>
			<td><?php echo $intervention['baseline'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'interventions', 'action' => 'view', $intervention['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'interventions', 'action' => 'edit', $intervention['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
