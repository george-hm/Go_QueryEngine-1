<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Enum\EnumEmployeeRange;
use Exception;

class ModelWhereAbstract
{
    protected $_arrWhere = [];

    public function __construct(EnumOutputField $enumOutputField)
    {
        $this->_arrWhere['name'] = $enumOutputField->getId();
    }

    public static function create(EnumOutputField $enumOutputField)
    {
        switch ($enumOutputField->getId()) {
            case EnumOutputField::OUTPUT_HOSTNAME:
            case EnumOutputField::OUTPUT_TRADING_POSTCODE:
            case EnumOutputField::OUTPUT_REGISTERED_POSTCODE:
            case EnumOutputField::OUTPUT_JOB_ROLES:
            case EnumOutputField::OUTPUT_SICCODES:
            case EnumOutputField::OUTPUT_TRADING_CITY:
            case EnumOutputField::OUTPUT_REGISTERED_CITY:
            case EnumOutputField::OUTPUT_MASTER_SECTORS:
                return new ModelWhereString($enumOutputField);
            case EnumOutputField::OUTPUT_EMPLOYEE_RANGE:
                return new ModelWhereIn(
                    $enumOutputField,
                    EnumEmployeeRange::class
                );
            case EnumOutputField::OUTPUT_LOCATION:
                return new ModelWhereLocation($enumOutputField);
            case EnumOutputField::OUTPUT_INCORPORATION_DATE:
                return new ModelWhereNum($enumOutputField);
            default:
                throw new Exception('Invalid output type');
        }
    }

    public function toArray()
    {
        if (count($this->_arrWhere) <= 1) {
            throw new Exception(
                'ModelWhere ' .
                get_class($this) .
                ' is empty, call one of the add methods'
            );
        }

        return $this->_arrWhere;
    }
}
