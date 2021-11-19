<?php

namespace Model\Where;

use Enum\EnumOutputField;
use Exception;

class ModelWhereAbstract {
    public function __construct(EnumOutputField $enumOutputField) {
        switch ($enumOutputField->getType()) {
            case EnumOutputField::TYPE_STRING:
                # code...
                break;
            default:
                throw new Exception('Invalid output type');
        }
    }
}
