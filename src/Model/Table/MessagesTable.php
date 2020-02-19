<?php
namespace App\Model\Table;


use Cake\ORM\Table;

class MessagesTable extends  Table {

    public function initialize(array $config): void
    {
        $this->belongsTo('Users')
            ->setForeignKey('owner_id');

        $this->belongsTo('RequestAdoptions')
            ->setForeignKey('request_adoption_id');

        $this->addBehavior('Timestamp');
    }
}
