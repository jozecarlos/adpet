<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;



/**
 * UserRegister Form.
 */
class UserRegisterForm extends Form
{
    /**
     * Builds the schema for the model less form
     *
     * @param Schema $schema From schema
     * @return Schema
     */
    protected function _buildSchema(Schema $schema):  Schema
    {
        return $schema->addField('name', 'string')
                      ->addField('email', ['type' => 'string'])
                      ->addField('password', ['type' => 'string']);
    }

    /**
     * Form validation builder
     *
     * @param Validator $validator to use against the form
     * @return Validator
     */
    protected function _buildValidator(Validator $validator): Validator
    {
        return $validator
            ->add('name', 'length', [ 'rule' => ['minLength', 3], 'message' => 'A name is required'])
            ->add('email', 'format', ['rule' => 'email', 'message' => 'A valid email address is required'])
            ->add('password', 'length', [ 'rule' => ['minLength', 6], 'message' => 'The password is invalid, eg.: 123456']);
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data
     * @return bool
     */
    protected function _execute(array $data): bool
    {
        $users = TableRegistry::getTableLocator()->get('Users');
        if ($users->save($users->newEntity($data))) {
           return true;
        }
        return false;
    }
}
