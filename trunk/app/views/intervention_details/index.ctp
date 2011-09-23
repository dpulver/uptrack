<div class="interventionDetails index">
	<h2><?php __('Intervention Details');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('intervention_id');?></th>
			<th><?php echo $this->Paginator->sort('week');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('score');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($interventionDetails as $interventionDetail):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $interventionDetail['InterventionDetail']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($interventionDetail['Intervention']['id'], array('controller' => 'interventions', 'action' => 'view', $interventionDetail['Intervention']['id'])); ?>
		</td>
		<td><?php echo $interventionDetail['InterventionDetail']['week']; ?>&nbsp;</td>
		<td><?php echo $interventionDetail['InterventionDetail']['date']; ?>&nbsp;</td>
		<td><?php echo $interventionDetail['InterventionDetail']['score']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $interventionDetail['InterventionDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $interventionDetail['InterventionDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $interventionDetail['InterventionDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $interventionDetail['InterventionDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Intervention Detail', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('controller' => 'interventions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('controller' => 'interventions', 'action' => 'add')); ?> </li>
	</ul>
</div>