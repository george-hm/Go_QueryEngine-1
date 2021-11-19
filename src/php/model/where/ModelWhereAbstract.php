<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;
use Exception;

class ModelWhereAbstract {
    public function __construct(EnumOutputField $enumOutputField) {
        switch ($enumOutputField->getType()) {
            case EnumOutputField::TYPE_STRING:
                return new ModelWhereString($enumOutputField);
            default:
                throw new Exception('Invalid output type');
        }
    }
}
