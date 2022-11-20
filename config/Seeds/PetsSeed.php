<?php
use Phinx\Seed\AbstractSeed;

/**
 * Pets seed.
 */
class PetsSeed extends AbstractSeed
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
            [
                'name'=> 'Supino',
                'birthday' => '2016-02-16 10:23:09',
                'gender' => 'M',
                'breed_id' => 1,
                'profile_picture' => 'pic01.jpg',
                'created' => '2022-11-20 13:15:09',
                'description' => 'Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum  wisi maecenas ligula.'],
            [
                'name'=> 'Bolinha',
                'birthday' => '2013-05-20 09:30:04',
                'gender' => 'F',
                'breed_id' => 2,
                'profile_picture' => 'pic02.jpg',
                'created' => '2022-11-20 13:15:09',
                'description' => 'Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum  wisi maecenas ligula.'],
            [
                'name'=> 'John Li',
                'birthday' => '2011-01-02 14:45:00',
                'gender' => 'M',
                'profile_picture' => 'pic03.jpg',
                'breed_id' => 3,
                'created' => '2022-11-20 13:15:09',
                'description' => 'Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum  wisi maecenas ligula.' ]
        ];

        $table = $this->table('pets');
        $table->insert($data)->save();
    }
}
