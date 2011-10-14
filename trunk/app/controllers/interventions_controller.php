<?php
class InterventionsController extends AppController {

	var $name = 'Interventions';
	var $uses = array('Intervention','InterventionDetail');
	var $helpers = array('Ajax','Javascript');

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
				//this should be in its own function ***
				$skill_id = $this->Intervention->field('skill_id', array('id =' => $this->Intervention->getinsertID()));
				$duration = $this->Intervention->Skill->field('duration', array('id =' => $skill_id));
				for ($i = 1; $i <= $duration; $i++) {
					$this->InterventionDetail->create();
					$data = array(
						'id' => NULL,
						'intervention_id' => $this->Intervention->getinsertID(),
						'week' => $i,
						'date' => NULL,
						);
					$this->InterventionDetail->save($data);
				}
				// *********
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
	
	function print_report($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for intervention', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('intervention', $this->Intervention->read(null, $id));
		$this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
	}
	
	function graph($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for intervention', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('intervention', $this->Intervention->read(null, $id));
		$this->layout = 'graph'; //this will use the graph.ctp layout 
        $this->render(); 
	}
	
}
