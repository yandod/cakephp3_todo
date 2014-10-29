<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lists Model
 */
class ListsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('lists');
		$this->displayField('name');
		$this->primaryKey('id');

		$this->hasMany('Tasks', [
			'foreignKey' => 'list_id',
		]);

        $this->entityClass('App\Model\Entity\ListObject');
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
			->add('created_at', 'valid', ['rule' => 'datetime'])
			->validatePresence('created_at', 'create')
			->notEmpty('created_at')
			->add('updated_at', 'valid', ['rule' => 'datetime'])
			->validatePresence('updated_at', 'create')
			->notEmpty('updated_at');

		return $validator;
	}

}
