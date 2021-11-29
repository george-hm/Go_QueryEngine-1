<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumEmployeeRange;
use Exception;
use GoQueryEngine\Enum\EnumOperators;

class ModelWhereEmployeeRange extends ModelWhereAbstract
{
    public function in(array $arrValues)
    {
        foreach ($arrValues as $enumEmployeeRange) {
            if (!($enumEmployeeRange instanceof EnumEmployeeRange)) {
                throw new Exception('Invalid value type');
            }

            $this->_arrWhere[EnumOperators::VALUE_IN][] =
                $enumEmployeeRange->getId();
        }

        return $this;
    }

    public function notIn(array $arrValues)
    {
        foreach ($arrValues as $enumEmployeeRange) {
            if (!($enumEmployeeRange instanceof EnumEmployeeRange)) {
                throw new Exception('Invalid value type');
            }

            $this->_arrWhere[EnumOperators::VALUE_NOT_IN][] =
                $enumEmployeeRange->getId();
        }

        return $this;
    }

    public function toArray()
    {
        if (
            !$this->_arrWhere[EnumOperators::VALUE_IN] &&
            !$this->_arrWhere[EnumOperators::VALUE_NOT_IN]
        ) {
            throw new Exception(
                "EmployeeRange must have at least 'in' or 'notIn' called"
            );
        }

        return $this->_arrWhere;
    }
}
