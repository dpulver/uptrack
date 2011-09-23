<div class="interventions view">
<h2><?php  __('Intervention');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Student'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($intervention['Student']['full_name'], array('controller' => 'students', 'action' => 'view', $intervention['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Skill'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($intervention['Skill']['name'], array('controller' => 'skills', 'action' => 'view', $intervention['Skill']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['start_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['end_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Completed'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['completed']? 'Yes' : 'No'; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Instructor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($intervention['Instructor']['username'], array('controller' => 'instructors', 'action' => 'view', $intervention['Instructor']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Goal Score'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['goal_score']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Goal Text'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['goal_text']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['notes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Baseline1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['baseline1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Baseline2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['baseline2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Baseline3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['baseline3']; ?>
			&nbsp;
		</dd>
	</dl>
	<dl>
		<dt>graph</dt>
		<dd><img src="/jpgraphs/" /></dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Intervention', true), array('action' => 'edit', $intervention['Intervention']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Intervention', true), array('action' => 'delete', $intervention['Intervention']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $intervention['Intervention']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Print Intervention', true), array('action' => 'print_report', $intervention['Intervention']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Intervention Details');?></h3>
	<?php if (!empty($intervention['InterventionDetail'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Intervention Id'); ?></th>
		<th><?php __('Week'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Score'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($intervention['InterventionDetail'] as $interventionDetail):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $interventionDetail['id'];?></td>
			<td><?php echo $interventionDetail['intervention_id'];?></td>
			<td><?php echo $interventionDetail['week'];?></td>
			<td><?php echo $interventionDetail['date'];?></td>
			<td><?php echo $interventionDetail['score'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'intervention_details', 'action' => 'view', $interventionDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'intervention_details', 'action' => 'edit', $interventionDetail['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'intervention_details', 'action' => 'delete', $interventionDetail['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $interventionDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Intervention Detail', true), array('controller' => 'intervention_details', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
