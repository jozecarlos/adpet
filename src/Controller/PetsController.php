<?php
namespace App\Controller;

use App\Form\PetCreateForm;
use Cake\Database\Expression\QueryExpression;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Response;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

/**
 * Pets Controller
 *
 * @property \App\Model\Table\PetsTable $Pets
 * @property bool|object Authentication
 */
class PetsController extends AppController
{

    public $paginate = [
        'limit' => 9
    ];

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->Flash->set('Quem ama as criaturas de Deus ama o próprio Deus', ['element' => 'intro']);

        $petTable = TableRegistry::getTableLocator()->get('Pets');

        if (!is_null($this->Authentication->getIdentity())) {
            $userId = $this->Authentication->getIdentity()->id;
            $query = $petTable->find()->where(function (QueryExpression $exp, Query $q) use ($userId) {
                return $exp->notEq('user_id', $userId);
            });
            $pets = $this->paginate($query);
        }
        else{
            $pets = $this->paginate();
        }

        $this->set(compact('pets'));
    }

    /**
     * View method
     *
     * @param string|null $id Pet id.
     * @return void
     */
    public function view($id = null)
    {
        try{

            $pet = $this->Pets->get($id, ['contain' => ['Breeds','Users', 'Messages.Users'] ]);

            if ($this->request->is('post')) {

                $messagesTable = TableRegistry::getTableLocator()->get('Messages');

                $message = $messagesTable->newEntity($this->request->getData());
                if($messagesTable->save($message)) {
                    $this->Flash->success(__('Pergunta enviada com sucesso'));
                } else {
                    $this->Flash->error(__('Não foi possível completar a requisição'));
                }
                $this->redirect(['action' => 'view', 'id' => $id], 200);
            }
            else{
                $pet->views = $pet->views + 1;
            }

            if ($this->Pets->save($pet)) {
                $this->set('pet', $pet);
            } else {
                $this->redirect(['action' => 'index'], 404);
            }
        }
        catch(RecordNotFoundException $ex){

           $this->redirect(['action' => 'index'], 404);
        }
    }

    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $petForm = new PetCreateForm();

        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $attachment = $this->request->getUploadedFile('profile_picture');
            $data['profile_picture'] = $attachment->getClientFilename();

            if ($petForm->execute($data)) {
                $destination = WWW_ROOT.'img/uploads/'. $attachment->getClientFilename();
                $attachment->moveTo($destination);
                $this->Flash->success(__('The pet has been saved.'));
                return $this->redirect("/my-pets");
            } else {
                $this->Flash->error(__('Unable to add the pet.'));
            }
        }

        $this->set('breeds', $this->Pets->Breeds->find('list'));
        $this->set('petForm', $petForm);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pet id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     */
    public function edit($id = null)
    {
        $petForm = new PetCreateForm();
        $petTable = TableRegistry::getTableLocator()->get('Pets');
        $pet = $petTable->get($id);
        $profile_picture = $pet->profile_picture;

        if ($this->request->is('get')) {
            $petForm->setData([
                'name' => $pet->name,
                'description' => $pet->description,
                'gender' => $pet->gender,
                'birthday' => $pet->birthday,
                'breed_id' => $pet->breed_id,
            ]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();
            if(strlen($data['profile_picture']) == 0){
                $data['profile_picture'] = $profile_picture;
            }

            TableRegistry::getTableLocator()->get('Pets')->patchEntity($pet, $data);

            if ($petTable->save($pet)) {
                $this->Flash->success(__('The pet has been saved.'));
                return $this->redirect("/my-pets");
            } else {
                $this->Flash->error(__('The pet could not be saved. Please, try again.'));
            }
        }
        $this->set('breeds', $this->Pets->Breeds->find('list'));
        $this->set('petForm', $petForm);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pet id.
     * @return Response
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);

        $petTable = TableRegistry::getTableLocator()->get('Pets');
        $pet = $petTable->get($id);

        if ($petTable->delete($pet)) {
            $this->Flash->success(__('The pet has been deleted.'));
        } else {
            $this->Flash->error(__('The pet could not be deleted. Please, try again.'));
        }
        return $this->redirect("/my-pets");
    }

    public function myPets(){

        $petsTable = TableRegistry::getTableLocator()->get('Pets');
        $requestAdoptionsTable = TableRegistry::getTableLocator()->get('RequestAdoptions');

        $pets = $petsTable->find()
            ->where(['user_id =' => $this->Authentication->getIdentity()->id]);

        $requestAdoptions = $requestAdoptionsTable->find()
            ->where(['pet_id IN' => $petsTable->find()->extract('id')->toArray()]);

        $this->set('pets', $pets->all());;
        $this->set('requestAdoptionsCount', $requestAdoptions->count());
    }
}
