<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;



/**
 * UserRegister Form.
 */
class UserLoginForm extends Form
{



    /**
     * Builds the schema for the modelless form
     *
     * @param Schema $schema From schema
     * @return Schema
     */
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('email', ['type' => 'string'])
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
        return $validator->add('email', 'format', ['rule' => 'email', 'message' => 'A valid email address is required'])
                         ->add('password', 'length', [ 'rule' => ['minLength', 6], 'message' => 'The password is invalid, eg.: 123456',
       ]);
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data
     * @return bool
     */
    protected function _execute(array $data): bool
    {
        return true;
    }
}
