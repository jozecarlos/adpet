<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PetsTable extends Table
{

    public function initialize(array $config): void
    {
        $this->setDisplayField('name');

        $this->addAssociations([
            'belongsTo' => [
                'Users' => ['className' => 'App\Model\Table\UsersTable'],
                'Breeds' => ['className' => 'App\Model\Table\BreedsTable']
            ],
            'hasMany' => ['Messages']
        ]);
        $this->addBehavior('Timestamp');
    }
}
