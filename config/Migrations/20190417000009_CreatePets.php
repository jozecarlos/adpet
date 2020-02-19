<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePets extends AbstractMigration
{


    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        if (!$this->hasTable('pets')) {
            $table = $this->table('pets');

            $table->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ]);
            $table->addColumn('description', 'text', [
                'default' => null,
                'null' => false,
            ]);
            $table->addColumn('gender', 'string', [
                'default' => 'M',
                'limit' => 2,
                'null' => false,
            ]);
            $table->addColumn('birthday', 'datetime', [
                'default' => null,
                'null' => true,
            ]);
            $table->addColumn('views', 'integer', [
                'default' => 0,
                'null' => true,
            ]);
            $table->addColumn('profile_picture', 'string', [
                'limit' => 255,
                'null' => true
            ]);
            $table->addColumn('created', 'datetime', [
                'default' => null,
                'null' => true,
            ]);
            $table->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => true,
            ]);

            $table->addColumn('breed_id', 'integer', [
                'default' => null,
                'null' => true,
            ]);
            $table->addForeignKey('breed_id', 'breeds', 'id');

            $table->addColumn('user_id', 'integer',[
                'default' => null,
                'null' => true,
            ]);
            $table->addForeignKey('user_id', 'users', 'id');


            $table->create();
        }
    }
}
