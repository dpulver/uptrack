<?php
class InterventionDetailsController extends AppController {

	var $name = 'InterventionDetails';

	function index() {
		$this->InterventionDetail->recursive = 0;
		$this->set('interventionDetails', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid intervention detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('interventionDetail', $this->InterventionDetail->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->InterventionDetail->create();
			if ($this->InterventionDetail->save($this->data)) {
				$this->Session->setFlash(__('The intervention detail has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The intervention detail could not be saved. Please, try again.', true));
			}
		}
		$interventions = $this->InterventionDetail->Intervention->find('list');
		$this->set(compact('interventions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid intervention detail', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->InterventionDetail->save($this->data)) {
				$this->Session->setFlash(__('The intervention detail has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The intervention detail could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->InterventionDetail->read(null, $id);
		}
		$interventions = $this->InterventionDetail->Intervention->find('list');
		$this->set(compact('interventions'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for intervention detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->InterventionDetail->delete($id)) {
			$this->Session->setFlash(__('Intervention detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Intervention detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
