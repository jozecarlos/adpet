<?php
namespace App\Model\Table;


use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends  Table {

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->hasOne('Addresses');
        $this->addBehavior('Timestamp');
    }


    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->requirePresence('name', 'A name is required')
            ->requirePresence('email', 'A email is required')
            ->requirePresence('password', 'A password is required')
            ->requirePresence('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['ADMIN', 'PUBLIC']],
                'message' => 'Please enter a valid role'
            ]);
    }
}
