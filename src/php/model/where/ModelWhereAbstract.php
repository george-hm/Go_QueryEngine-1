<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;
use Exception;

class ModelWhereAbstract
{
    protected $_arrWhere = [];

    public static function create(EnumOutputField $enumOutputField)
    {
        switch ($enumOutputField->getType()) {
            case EnumOutputField::TYPE_STRING:
                return new ModelWhereString($enumOutputField);
            default:
                throw new Exception('Invalid output type');
        }
    }

    public final function toArray()
    {
        return $this->_arrWhere;
    }
}
