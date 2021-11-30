<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumMasterSectors;
use GoQueryEngine\Enum\EnumOperators;
use Exception;

class ModelWhereEmployeeRange extends ModelWhereAbstract
{
    public function in(array $arrValues)
    {
        foreach ($arrValues as $enumMasterSectors) {
            if (!($enumMasterSectors instanceof EnumMasterSectors)) {
                throw new Exception('Invalid value type');
            }

            $this->_arrWhere[EnumOperators::VALUE_IN][] =
                $enumMasterSectors->getId();
        }

        return $this;
    }

    public function notIn(array $arrValues)
    {
        foreach ($arrValues as $enumMasterSectors) {
            if (!($enumMasterSectors instanceof EnumMasterSectors)) {
                throw new Exception('Invalid value type');
            }

            $this->_arrWhere[EnumOperators::VALUE_NOT_IN][] =
                $enumMasterSectors->getId();
        }

        return $this;
    }

    public function toArray()
    {
        if (
            !isset($this->_arrWhere[EnumOperators::VALUE_IN]) &&
            !isset($this->_arrWhere[EnumOperators::VALUE_NOT_IN])
        ) {
            throw new Exception(
                "EmployeeRange must have at least 'in' or 'notIn' called"
            );
        }

        return $this->_arrWhere;
    }
}
