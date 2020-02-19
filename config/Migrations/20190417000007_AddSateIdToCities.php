<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddSateIdToCities extends AbstractMigration
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
        $table = $this->table('cities');
        $table->addColumn('state_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addIndex('name');
        $table->addForeignKey('state_id', 'states', 'id');
        $table->update();
    }
}
