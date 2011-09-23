<?php
class Instructor extends AppModel {
	var $name = 'Instructor';
	var $displayField = 'username';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Intervention' => array(
			'className' => 'Intervention',
			'foreignKey' => 'instructor_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
