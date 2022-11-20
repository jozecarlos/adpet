<?php
use Phinx\Seed\AbstractSeed;

/**
 * Breeds seed.
 */
class BreedsSeed extends AbstractSeed
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
        $data = [   ['name'=>''],
                    ['name'=>'Afghan Hound'],
                    ['name'=>'Airedale Terrier'],
                    ['name'=>'Akita'],
                    ['name'=>'Alaskan'],
                    ['name'=>'American Eskimo Dog'],
                    ['name'=>'American Foxhound'],
                    ['name'=>'American Pit Bull Terrier'],
                    ['name'=>'American Water Spaniel'],
                    ['name'=>'Anatolian Shepherd Dog'],
                    ['name'=>'Appenzeller Sennenhunde'],
                    ['name'=>'Australian Cattle Dog'],
                    ['name'=>'Australian Shepherd'],
                    ['name'=>'Australian Terrier'],
                    ['name'=>'Azawakh']
                ];

        $table = $this->table('breeds');
        $table->insert($data)->save();
    }
}
