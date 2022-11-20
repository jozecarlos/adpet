<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;


class RequestAdoptionsController extends AppController {

    public function add($petId){

        $userId = $this->Authentication->getIdentity()->id;
        $adoption = $this->RequestAdoptions->newEmptyEntity();

        $countRequestAdoption = $this->RequestAdoptions->find()->where([
            'pet_id' => $petId,
            'user_id' => $userId,
        ])->count();

        if($countRequestAdoption == 0){
            $adoption->user_id = $userId;
            $adoption->pet_id = $petId;

            if($this->RequestAdoptions->save($adoption)){
                $this->Flash->success(__('Adoption Request Sent.'));
            }
        }else{
            $this->Flash->error(__('Do you have a Adoption Request for that Pet.'));
        }

        return $this->redirect($this->referer());
    }

    public function index($petId)
    {
        $adoptionsRequestTable = TableRegistry::getTableLocator()->get('RequestAdoptions');
        $results = $adoptionsRequestTable->find()->where(['pet_id' => $petId])->all();
        if($results->count() > 0):
           $withMore = $adoptionsRequestTable->loadInto($results, ['Pets', 'Users']);
           $this->set('adoptions', $withMore);
        else:
            $this->set('adoptions', $results);
        endif;
    }

    public function view($id)
    {
         if ($this->request->is('post')) {

            $messagesTable = TableRegistry::getTableLocator()->get('Messages');

            $message = $messagesTable->newEntity($this->request->getData());
            if($messagesTable->save($message)){
                $this->redirect(['action' => 'view', 'id' => $id], 200);
            }
        }

        $adoptionsRequest = $this->RequestAdoptions->get($id, [
            'contain' => ['Pets.Users', 'Users', 'Messages.Users']
        ]);

        $this->set('adoption', $adoptionsRequest);
    }

    public function myRequestAdoptions(){

        $userId = $this->Authentication->getIdentity()->id;
        $adoptionsRequestTable = TableRegistry::getTableLocator()->get('RequestAdoptions');
        $results = $adoptionsRequestTable->find()->where(['user_id' => $userId])->all();

        if(count($results)){
            $results = $adoptionsRequestTable->loadInto($results, ['Pets.Users', 'Users']);
        }

        $this->set('adoptions', $results);
    }
}
