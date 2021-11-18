<?php

namespace Model\Output;

use Enum\EnumOutputType;
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
