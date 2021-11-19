<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputType;
use Exception;

abstract class ModelOutputAbstract
{
    public static function create(EnumOutputType $enumOutputType) {
        switch ($enumOutputType->getId()) {
            case EnumOutputType::OUTPUT_COUNT:
                return new ModelOutputAbstract();
            default:
                throw new Exception('Invalid output type');
        }
    }

    public abstract function setField();
}
