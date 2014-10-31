<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
        $this->loadModel('Lists');
        $this->set('todo', $this->Tasks->find());
        $this->set('task', $this->Tasks->newEntity($this->request->data));
        $this->set('lists', $this->Lists->find());

    }

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$task = $this->Tasks->get($id, [
			'contain' => []
		]);
		$this->set('task', $task);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$task = $this->Tasks->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Tasks->save($task)) {
				//$this->Flash->success('The task has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The task could not be saved. Please, try again.');
			}
		}
		$this->set(compact('task'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$task = $this->Tasks->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$task = $this->Tasks->patchEntity($task, $this->request->data);
			if ($this->Tasks->save($task)) {
				//$this->Flash->success('The task has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The task could not be saved. Please, try again.');
			}
		}
		$this->set(compact('task'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$task = $this->Tasks->get($id);
		//$this->request->allowMethod('post', 'delete');
		if ($this->Tasks->delete($task)) {
			$this->Flash->success('The task has been deleted.');
		} else {
			$this->Flash->error('The task could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
