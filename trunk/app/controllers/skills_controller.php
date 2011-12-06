<?php
class SkillsController extends AppController {

	var $name = 'Skills';
	
	function index() {
		$this->Skill->recursive = 0;
		$this->set('skills', $this->paginate());
	}

	function view($id = null) {
		$this->Skill->Behaviors->attach('Containable');
		if (!$id) {
			$this->Session->setFlash(__('Invalid skill', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Session->read('Auth.Instructor.group_id') == ADMIN)//test to see if admin
		{
			$this->set('skill', $this->Skill->read(null, $id));
		}
		else //limited to instructors if not
		{
			$instructor_id = $this->Session->read('Auth.Instructor.id');
			$data = $this->Skill->find('first', array(
                'conditions' => array('Skill.id' => $id),
				'contain' => array(
					'Intervention' => array(
						'Student', 
						'Instructor',
						'conditions' => array('Intervention.instructor_id' => $instructor_id)
						))));
			$this->set('skill', $data);
		}
		
		
	}

	function add() {
		if (!empty($this->data)) {
			$this->Skill->create();
			if ($this->Skill->save($this->data)) {
				$this->Session->setFlash(__('The skill has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The skill could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid skill', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Skill->save($this->data)) {
				$this->Session->setFlash(__('The skill has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The skill could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Skill->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for skill', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Skill->delete($id)) {
			$this->Session->setFlash(__('Skill deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Skill was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
