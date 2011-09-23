<?php
class InterventionDetail extends AppModel {
	var $name = 'InterventionDetail';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Intervention' => array(
			'className' => 'Intervention',
			'foreignKey' => 'intervention_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
