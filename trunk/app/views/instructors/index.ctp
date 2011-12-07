<div class="instructors index">
	<h2><?php __('Instructors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($instructors as $instructor):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $instructor['Instructor']['id']; ?>&nbsp;</td>
		<td><?php echo $instructor['Instructor']['username']; ?>&nbsp;</td>
		<td><?php echo $instructor['Instructor']['email']; ?>&nbsp;</td>
		<td><?php echo $instructor['Instructor']['first_name']; ?>&nbsp;</td>
		<td><?php echo $instructor['Instructor']['last_name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($instructor['Group']['name'], array('controller' => 'groups', 'action' => 'view', $instructor['Group']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $instructor['Instructor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $instructor['Instructor']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $instructor['Instructor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $instructor['Instructor']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Instructor', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add')); ?> </li>
	</ul>
</div>