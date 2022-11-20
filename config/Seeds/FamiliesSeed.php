<?php
use Phinx\Seed\AbstractSeed;

/**
 * Families seed.
 */
class FamiliesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [ 
                    ['name'=>'Camine'],
                    ['name'=>'Feline'],
                    ['name'=>'Reptil'],
                ];

        $table = $this->table('families');
        $table->insert($data)->save();
    }
}
