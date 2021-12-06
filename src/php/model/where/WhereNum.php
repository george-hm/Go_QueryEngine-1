<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Traits\TraitOperatorEquals;
use GoQueryEngine\Enum\EnumOperators;

class ModelWhereNum extends ModelWhereAbstract
{
    use TraitOperatorEquals;

    public function gte($intValue)
    {
        $this->_arrWhere[EnumOperators::VALUE_GTE] = $intValue;
    }

    public function lte($intValue)
    {
        $this->_arrWhere[EnumOperators::VALUE_LTE] = $intValue;
    }
}
