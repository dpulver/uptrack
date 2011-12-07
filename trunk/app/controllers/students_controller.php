<?php
class StudentsController extends AppController {

	var $name = 'Students';

	function index() {
		$this->Student->recursive = 0;
		$this->set('students', $this->paginate());
	}

	function view($id = null) {
		$this->Student->Behaviors->attach('Containable');
		if (!$id) {
			$this->Session->setFlash(__('Invalid student', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Session->read('Auth.Instructor.group_id') == ADMIN)//test to see if admin
		{
			$this->Student->recursive = 2;
			$this->set('student', $this->Student->read(null, $id));
		}
		else //limited to instructors if not
		{
			$instructor_id = $this->Session->read('Auth.Instructor.id');
			$data = $this->Student->find('first', array(
                'conditions' => array('Student.id' => $id),
				'contain' => array(
					'Intervention' => array(
						'Skill', 
						'Instructor',
						'conditions' => array('Intervention.instructor_id' => $instructor_id)
						))));
			$this->set('student', $data);
		}
	}

	function add() {
		if (!empty($this->data)) {
			$this->Student->create();
			if ($this->Student->save($this->data)) {
				$this->Session->setFlash(__('The student has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid student', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Student->save($this->data)) {
				$this->Session->setFlash(__('The student has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Student->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for student', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Student->delete($id)) {
			$this->Session->setFlash(__('Student deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Student was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
