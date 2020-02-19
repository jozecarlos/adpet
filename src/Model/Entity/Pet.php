<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Pet extends Entity
{
    protected function _getAge()
    {
        if (!empty($this->_properties['birthday'])) {
            return (intval(date('Y', time() - strtotime($this->_properties['birthday']))) - 1970) + 1;
        }
        return 'Sem idade definida - 0 ';
    }
}
