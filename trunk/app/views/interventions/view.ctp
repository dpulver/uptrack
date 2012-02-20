<div class="interventions view">
<h2><?php  __('Intervention');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Baseline'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $intervention['Intervention']['baseline']; ?>
			&nbsp;
		</dd>
	</dl>
	<dl>
		<dt><img src="/interventions/graph/<?php echo $intervention['Intervention']['id']; ?>"></dt>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interventions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Skills', true), array('controller' => 'skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructors', true), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
		
		<li><?php echo $this->Html->link(__('Edit Intervention', true), array('action' => 'edit', $intervention['Intervention']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Intervention', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Print Intervention', true), array('action' => 'print_report', $intervention['Intervention']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Intervention Details');?></h3>
	<?php if (!empty($intervention['InterventionDetail'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Week'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Score'); ?></th>
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
			<td><?php echo $interventionDetail['week'];?></td>
			<td><div class="edit" id="date<?php echo $interventionDetail['id']?>" style="min-height: 20px"><?php echo $interventionDetail['date'];?></div></td>
			<script>
			<?php
			$detailid = $interventionDetail['id'];
			echo "$(function(){\n 
				$(\"#date$detailid\" ).editInPlace({\n 
					url:\"/intervention_details/update_detail\", 
					field_type:	\"datepicker\",
					show_buttons: true,
					element_id: $detailid,
					params: \"detailid=$detailid&field=date\"
					});\n 
				});\n";
			?>
			</script>
			<td><div class="edit" id="score<?php echo $interventionDetail['id']?>" style="min-height: 20px"><?php echo $interventionDetail['score'];?></div></td>
			<script>
			<?php
			$detailid = $interventionDetail['id'];
			echo "$(function(){\n 
				$(\"#score$detailid\" ).editInPlace({\n 
					url:\"/intervention_details/update_detail/$detailid\", 
					show_buttons: true,
					element_id: $detailid,
					params: \"detailid=$detailid&field=score\"
					});\n 
				});\n";
			?>
			</script>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
