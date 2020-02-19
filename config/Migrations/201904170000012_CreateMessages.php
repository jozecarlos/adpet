<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateMessages extends AbstractMigration
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

        if (!$this->hasTable('messages')) {
            $table = $this->table('messages');

            $table->addColumn('content', 'text', [
                'null' => false,
            ]);

            $table->addColumn('answer', 'text', [
                'default' => null,
                'null' => true,
            ]);

            $table->addColumn('owner_id', 'integer', [
                'null' => false,
            ]);

            $table->addColumn('created', 'datetime', ['default' => null, 'null' => true]);
            $table->addColumn('modified', 'datetime', ['default' => null,'null' => true]);
            $table->addColumn('request_adoption_id', 'integer', [ 'null' => true]);
            $table->addColumn('pet_id', 'integer', ['null' => true]);


            $table->addForeignKey('owner_id', 'users', 'id');
            $table->addForeignKey('request_adoption_id', 'request_adoptions', 'id');
            $table->addForeignKey('pet_id', 'pets', 'id');

            $table->create();
        }
    }
}
