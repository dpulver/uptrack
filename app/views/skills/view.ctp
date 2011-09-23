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
		<li><?php echo $this->Html->link(__('Edit Skill', true), array('action' => 'edit', $skill['Skill']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Skill', true), array('action' => 'delete', $skill['Skill']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $skill['Skill']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Skills', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Skill', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Interventions');?></h3>
	<?php if (!empty($skill['Intervention'])):?>
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
		<th><?php __('Baseline1'); ?></th>
		<th><?php __('Baseline2'); ?></th>
		<th><?php __('Baseline3'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($skill['Intervention'] as $intervention):
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
			<td><?php echo $intervention['baseline1'];?></td>
			<td><?php echo $intervention['baseline2'];?></td>
			<td><?php echo $intervention['baseline3'];?></td>
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
