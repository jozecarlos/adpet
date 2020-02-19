<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;



/**
 * UserRegister Form.
 */
class UserQuestionForm extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param Schema $schema From schema
     * @return Schema
     */
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('content', 'string')
            ->addField('pet_id', ['type' => 'integer']);

    }

    /**
     * Form validation builder
     *
     * @param Validator $validator to use against the form
     * @return Validator
     */
    protected function _buildValidator(Validator $validator): Validator
    {
        return $validator->add('content', 'required', ['rule' => 'notBlank', 'message' => 'The message can be empty']);
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data
     * @return bool
     */
    protected function _execute(array $data): bool
    {
        $table = TableRegistry::getTableLocator()->get('Messages');
        if ($table->save($table->newEntity($data))) {
            return true;
        }

        return false;
    }
}
