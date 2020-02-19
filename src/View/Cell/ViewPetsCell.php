<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;

/**
 * ViewPets cell
 */
class ViewPetsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @param $pet
     * @internal param $breed
     * @return void
     */
    public function display( $pet )
    {
        $this->loadModel('Pets');

        if(isset($pet->breed)){

            $query = TableRegistry::getTableLocator()->get('Pets')->find('all', [
                'conditions' => [
                    'Pets.breed_id =' => $pet->breed->id,
                    'Pets.id <>' => $pet->id
                ],
                'contain' => ['Breeds'],
                'limit' => 10,
                'order' => ['views' => 'DESC']
            ]);
            $this->set('pets', $query->all());
        }else{
            $this->set('pets', []);
        }
    }
}
