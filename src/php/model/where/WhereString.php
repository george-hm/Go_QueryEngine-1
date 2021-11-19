<?php

namespace Model\Where;

use Enum\EnumOutputField;
use Traits\TraitOperatorEquals;
use Exception;

class ModelWhereString extends ModelWhereAbstract
{
    use TraitOperatorEquals;

    public function __construct(EnumOutputField $enumOutputField)
    {
        if ($enumOutputField->getType() !== EnumOutputField::TYPE_STRING) {
            throw new Exception('Invalid output type');
        }
        $this->_enumOutputField = $enumOutputField;
        $this->_arrWhere = [
            'name' => $enumOutputField->getId(),
        ];
    }
}
