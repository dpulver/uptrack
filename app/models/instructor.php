<?php
class Instructor extends AppModel {
	var $name = 'Instructor';
	var $virtualFields = array(    'full_name' => 'CONCAT(Instructor.first_name, " ", Instructor.last_name)');
	
	var $displayField = 'full_name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
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
	var $actsAs = array('Acl' => array('type' => 'requester'));

	function parentNode() {
		if (!$this->id && empty($this->data)) { 
			return null;   
		}    
		if (isset($this->data['Instructor']['group_id'])) {  
			$groupId = $this->data['Instructor']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}    
		if (!$groupId) { 
			return null;    
		} else {  
		return array('Group' => array('id' => $groupId)); 
		}
	}
}
