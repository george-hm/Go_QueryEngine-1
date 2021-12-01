<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Traits\TraitOperatorEquals;
use Exception;

class ModelWhereString extends ModelWhereAbstract
{
    use TraitOperatorEquals;

    public function in(array $arrValues)
    {
        foreach ($arrValues as $mixCurrentValue) {
            if (!is_string($mixCurrentValue)) {
                throw new Exception('Invalid for \'in\' operator');
            }

            $this->_arrWhere['in'] = $arrValues;
        }

        return $this;
    }

    public function notIn(array $arrValues)
    {
        foreach ($arrValues as $mixCurrentValue) {
            if (!is_string($mixCurrentValue)) {
                throw new Exception('Invalid for \'not in\' operator');
            }

            $this->_arrWhere['not_in'] = $arrValues;
        }

        return $this;
    }

    public function like(string $strValue)
    {
        $this->_arrWhere['like'] = $strValue;
        return $this;
    }

    public function regexp(string $strRegexp)
    {
        $this->_arrWhere['regexp'] = $strRegexp;
        return $this;
    }
}
