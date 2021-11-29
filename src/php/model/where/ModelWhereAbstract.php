<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;
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
                return new ModelWhereString($enumOutputField);
            case EnumOutputField::OUTPUT_EMPLOYEE_RANGE:
                return new ModelWhereEmployeeRange($enumOutputField);
            case EnumOutputField::OUTPUT_LOCATION:
                return new ModelWhereLocation($enumOutputField);
            default:
                throw new Exception('Invalid output type');
        }
    }

    public function toArray()
    {
        return $this->_arrWhere;
    }
}
