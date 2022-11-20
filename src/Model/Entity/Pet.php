<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Pet extends Entity
{
    protected function _getAge()
    {
        return $this->calcularIdade($this->birthday);
    }

    private function calcularIdade( $dataDeNascimento ){
        if (!empty($dataDeNascimento)) {
            return (intval(date('Y', time() - strtotime($dataDeNascimento))) - 1970) + 1;
        }
        return 'Sem idade definida - 0 ';
    }
}
