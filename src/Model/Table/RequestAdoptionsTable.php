<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RequestAdoptionsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addAssociations([
            'belongsTo' => [
                'Users' => ['className' => 'App\Model\Table\UsersTable'],
                'Pets' => ['className' => 'App\Model\Table\PetsTable']
            ],
            'hasMany' => ['Messages']
        ]);

        $this->addBehavior('Timestamp');
    }
}
