<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tasks Model
 */
class TasksTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('tasks');
		$this->displayField('name');
		$this->primaryKey('id');

		$this->belongsTo('Lists', [
			'foreignKey' => 'list_id',
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->allowEmpty('name')
			->add('done', 'valid', ['rule' => 'boolean'])
			->allowEmpty('done')
			->add('created_at', 'valid', ['rule' => 'datetime'])
			->validatePresence('created_at', 'create')
			->notEmpty('created_at')
			->add('updated_at', 'valid', ['rule' => 'datetime'])
			->validatePresence('updated_at', 'create')
			->notEmpty('updated_at')
			->add('list_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('list_id');

		return $validator;
	}

}
