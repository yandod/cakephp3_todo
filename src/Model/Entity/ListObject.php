<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * ListObject Entity.
 */
class ListObject extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'created_at' => true,
		'updated_at' => true,
		'tasks' => true,
	];

    protected function _getTasks() {
        $tasks = TableRegistry::get('Tasks');
        return $tasks->find('all')
            ->where(['list_id' => $this->id])
            ->all();
    }
}
