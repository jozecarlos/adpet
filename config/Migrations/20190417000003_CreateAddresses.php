<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAddresses extends AbstractMigration
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

        if (!$this->hasTable('addresses')) {
            $table = $this->table('addresses');

            $table->addColumn('street', 'string', ['default' => null,'limit' => 255, 'null' => false]);
            $table->addColumn('zip_code', 'integer', ['default' => null,'null' => false]);

            $table->create();
        }
    }
}
