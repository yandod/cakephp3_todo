<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\ListsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListsTable Test Case
 */
class ListsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Lists') ? [] : ['className' => 'App\Model\Table\ListsTable'];
		$this->Lists = TableRegistry::get('Lists', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lists);

		parent::tearDown();
	}

}
