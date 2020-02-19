<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;


/**
 * UserRegister Form.
 */
class PetCreateForm extends Form
{
    /**
     * Builds the schema for the model less form
     *
     * @param Schema $schema From schema
     * @return Schema
     */
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('name', 'string')
                      ->addField('description', ['type' => 'text'])
                      ->addField('gender', ['type' => 'string'])
                      ->addField('profile_picture', ['type' => 'string'])
                      ->addField('birthday', ['type' => 'datetime'])
                      ->addField('breed_id', ['type' => 'integer'])
                      ->addField('user_id', ['type' => 'integer']);
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
            ->add('name', 'required', ['rule' => 'notBlank', 'message' => 'The name can be empty'])
            ->add('gender', 'required', ['rule' => 'notBlank', 'message' => 'The gender can be empty'])
            ->add('birthday', 'required', ['rule' => 'notBlank', 'message' => 'The birthday can be empty']);
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data
     * @return bool
     */
    protected function _execute(array $data): bool
    {
        debug($data);
        //die();
        $pets = TableRegistry::getTableLocator()->get('Pets');
        if ($pets->save($pets->newEntity($data))) {
            return true;
        }

        return false;
    }
}
