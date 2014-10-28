<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lists Controller
 *
 * @property App\Model\Table\ListsTable $Lists
 */
class ListsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('lists', $this->paginate($this->Lists));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$list = $this->Lists->get($id, [
			'contain' => []
		]);
		$this->set('list', $list);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$list = $this->Lists->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Lists->save($list)) {
				$this->Flash->success('The list has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The list could not be saved. Please, try again.');
			}
		}
		$this->set(compact('list'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$list = $this->Lists->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$list = $this->Lists->patchEntity($list, $this->request->data);
			if ($this->Lists->save($list)) {
				$this->Flash->success('The list has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The list could not be saved. Please, try again.');
			}
		}
		$this->set(compact('list'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$list = $this->Lists->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Lists->delete($list)) {
			$this->Flash->success('The list has been deleted.');
		} else {
			$this->Flash->error('The list could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
