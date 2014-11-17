<?php

use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $lists = $this->table('lists');
        $lists->addColumn('name','string', ['limit' => 20])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->save();

        $this->execute("INSERT INTO `lists` VALUES (1,'Welcome','2014-10-27 08:50:02','2014-10-27 08:50:02');");

        $tasks = $this->table('tasks');
        $tasks->addColumn('name','string', ['limit' => 255])
            ->addColumn('done','boolean')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->addColumn('list_id', 'integer')
            ->save();

        $this->execute("INSERT INTO `tasks` VALUES (1,'Check out our docs https://support.cloud.engineyard.com/forums',NULL,'2014-10-27 08:50:02','2014-10-27 08:50:02',1),(2,'Follow @EngineYard http://twitter.com/#!/engineyard',NULL,'2014-10-27 08:50:02','2014-10-27 08:50:02',1),(3,'Follow @eycloud http://twitter.com/#!/eycloud',NULL,'2014-10-27 08:50:02','2014-10-27 08:50:02',1),(4,'We blog http://www.engineyard.com/blog/',NULL,'2014-10-27 08:50:02','2014-10-27 08:50:02',1),(5,'Rock on!',NULL,'2014-10-27 08:50:02','2014-10-27 08:50:02',1);");
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}