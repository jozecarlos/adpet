<?php
use Phinx\Seed\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
            ['name'=> 'José Carlos', 'email' => 'josecarlos@cake.com', 'password'=>'$2y$10$HFSGVCvUmOp4d3A9AStxf.Tfrql00N9zye9xDs9JPLuQopc12ZtLi', 'role' => 'ADMIN'],
            ['name'=> 'Deise Cristina', 'email' => 'deise@cake.com', 'password' => '$2y$10$HFSGVCvUmOp4d3A9AStxf.Tfrql00N9zye9xDs9JPLuQopc12ZtLi', 'role' => 'PUBLIC'],
            ['name'=> 'Silvia Carla', 'email' => 'silvia@cake.com', 'password' => '$2y$10$HFSGVCvUmOp4d3A9AStxf.Tfrql00N9zye9xDs9JPLuQopc12ZtLi', 'role' => 'PUBLIC'],
            ['name'=> 'Romário Araújo', 'email' => 'romario@cake.com', 'password' => '$2y$10$HFSGVCvUmOp4d3A9AStxf.Tfrql00N9zye9xDs9JPLuQopc12ZtLi', 'role' => 'PUBLIC'],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
