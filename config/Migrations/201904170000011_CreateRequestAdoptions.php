<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateRequestAdoptions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {

        if (!$this->hasTable('request_adoptions')) {
            $table = $this->table('request_adoptions');

            $table->addColumn('accepted', 'boolean', ['default' => 0, 'null' => false]);
            $table->addColumn('created', 'datetime', ['default' => null, 'null' => true]);
            $table->addColumn('modified', 'datetime', ['default' => null,'null' => true]);

            $table->addColumn('user_id', 'integer');
            $table->addIndex('user_id');
            $table->addForeignKey('user_id', 'users', 'id');

            $table->addColumn('pet_id', 'integer');
            $table->addIndex('pet_id');
            $table->addForeignKey('pet_id', 'pets', 'id');

            $table->create();
        }
    }
}
