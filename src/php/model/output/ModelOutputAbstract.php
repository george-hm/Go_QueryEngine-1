<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputType;
use Exception;

abstract class ModelOutputAbstract
{

    public function __construct(EnumOutputType $enumOutputType) {
        $this->_enumOutputType = $enumOutputType;
    }

    public static function create(EnumOutputType $enumOutputType) {
        switch ($enumOutputType->getId()) {
            case EnumOutputType::OUTPUT_COUNT:
                return new ModelOutputAbstract($enumOutputType);
            default:
                throw new Exception('Invalid output type');
        }
    }

    public function getType() {
        return $this->_enumOutputType->getId();
    }

    public abstract function setField();
}
