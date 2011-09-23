<?php
class InterventionsController extends AppController {

	var $name = 'Interventions';

	function index() {
		$this->Intervention->recursive = 0;
		$this->set('interventions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid intervention', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('intervention', $this->Intervention->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Intervention->create();
			if ($this->Intervention->save($this->data)) {
				$this->Session->setFlash(__('The intervention has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The intervention could not be saved. Please, try again.', true));
			}
		}
		$students = $this->Intervention->Student->find('list');
		$skills = $this->Intervention->Skill->find('list');
		$instructors = $this->Intervention->Instructor->find('list');
		$this->set(compact('students', 'skills', 'instructors'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid intervention', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Intervention->save($this->data)) {
				$this->Session->setFlash(__('The intervention has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The intervention could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Intervention->read(null, $id);
		}
		$students = $this->Intervention->Student->find('list');
		$skills = $this->Intervention->Skill->find('list');
		$instructors = $this->Intervention->Instructor->find('list');
		$this->set(compact('students', 'skills', 'instructors'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for intervention', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Intervention->delete($id)) {
			$this->Session->setFlash(__('Intervention deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Intervention was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function print_report($id = null, $student = 'bob') {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for intervention', true));
			$this->redirect(array('action'=>'index'));
		}
		/*if ($this->Intervention->print_report($id)) {
			$this->Session->setFlash(__('Report printed', true));
			$this->redirect(array('action'=>'index'));
		}*/
		//$this->Session->setFlash(__('Intervention was not printed', true));
		//$this->redirect(array('action' => 'index'));
		$temp = $intervention['Student']['full_name'];
		$this->set('student', $temp );
		$this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
	}
}
