<?php
class Student extends AppModel {
	var $name = 'Student';
	var $virtualFields = array(    'full_name' => 'CONCAT(Student.first_name, " ", Student.last_name)');
	
	var $displayField = 'full_name';
	var $order = "last_name";
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Intervention' => array(
			'className' => 'Intervention',
			'foreignKey' => 'student_id',
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
