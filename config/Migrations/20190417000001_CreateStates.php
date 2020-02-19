<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateStates extends AbstractMigration
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
        if (!$this->hasTable('states')){
            $table = $this->table('states');

            $table->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ]);

            $table->create();
        }
    }
}
