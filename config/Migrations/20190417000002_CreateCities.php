<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCities extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {

        if (!$this->hasTable('cities')) {
            $table = $this->table('cities');
            $table->addColumn('name', 'string', ['default' => null, 'limit' => 255, 'null' => false,]);
            $table->save();
        }
    }
}
