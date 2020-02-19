<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        if (!$this->hasTable('users')) {
            $table = $this->table('users');

            $table->addColumn('name', 'string', ['default' => null,'limit' => 255,'null' => false]);
            $table->addColumn('email', 'string', ['default' => null,'limit' => 255,'null' => false]);
            $table->addColumn('password', 'string', ['default' => null,'limit' => 255,'null' => false]);
            $table->addColumn('phone', 'string', ['default' => null,'limit' => 255,'null' => false]);
            $table->addColumn('role', 'string', ['default' => null,'limit' => 255,'null' => false]);
            $table->addColumn('profile_picture', 'string', [
                'limit' => 255,
                'null' => true,
            ]);

            $table->create();
        }
    }
}
