<?php

namespace App\Controller;

use App\Form\UserRegisterForm;
use Cake\Event\Event;


class UsersController extends AppController {

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['add', 'login', 'logout']);
    }

    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {

        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = new UserRegisterForm();

        if ($this->request->is('post')) {
            if ($user->execute($this->request->getData())) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect("/");
            } else {
                $this->Flash->error(__('Unable to add the user.'));
            }
        }

        $this->set('user', $user);
    }


    public function login()
    {
        $result = $this->Authentication->getResult();

        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $authService = $this->Authentication->getAuthenticationService();

            // Assuming you are using the `Password` identifier.
            if ($authService->identifiers()->get('Password')->needsPasswordRehash()) {
                // Rehash happens on save.
                $user = $this->Users->get($this->Auth->user('id'));
                $user->password = $this->request->getData('password');
                $this->Users->save($user);
            }

            $redirect = $this->request->getQuery(
                'redirect',
                ['controller' => 'Pets', 'action' => 'index']
            );
            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        if($this->Authentication->logout()){
            return $this->redirect("/");
        }
    }


}
