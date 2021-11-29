<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputType;
use Exception;

abstract class ModelOutputAbstract
{
    public function __construct(
        EnumOutputType $enumOutputType,
        array $arrOptions = []
    )
    {
        $this->_enumOutputType = $enumOutputType;
        $this->_arrOptions = $arrOptions;
    }

    public static function create(EnumOutputType $enumOutputType)
    {
        switch ($enumOutputType->getId()) {
            case EnumOutputType::OUTPUT_COUNT:
                return new ModelOutputCount($enumOutputType);
            default:
                throw new Exception('Invalid output type');
        }
    }

    public function getType()
    {
        return $this->_enumOutputType->getId();
    }
}
