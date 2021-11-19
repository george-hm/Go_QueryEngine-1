<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Traits\TraitOperatorEquals;
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
        $this->_arrWhere['name'] = $enumOutputField->getId();
    }

    public function in(array $arrValues)
    {
        foreach ($arrValues as $mixCurrentValue) {
            if (!is_string($mixCurrentValue)) {
                throw new Exception('Invalid for \'in\' operator');
            }

            $this->_arrWhere['in'] = $arrValues;
        }
    }

    public function like(string $strValue)
    {
        $this->_arrWhere['like'] = $strValue;
    }

    public function regexp(string $strRegexp)
    {
        $this->_arrWhere['regexp'] = $strRegexp;
    }
}
