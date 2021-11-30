<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputType;
use GoQueryEngine\Enum\EnumOutputField;
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
        if (
            isset($arrOptions[EnumOutputType::OUTPUT_SETTING_ROW]) &&
            !(
                $arrOptions[EnumOutputType::OUTPUT_SETTING_ROW] instanceof
                    EnumOutputField
            )
        ) {
            throw new Exception('OutputRow must be an EnumOutputField');
        }

        if (
            isset($arrOptions[EnumOutputType::OUTPUT_SETTING_COLUMN]) &&
            !(
                $arrOptions[EnumOutputType::OUTPUT_SETTING_COLUMN] instanceof
                    EnumOutputField
            )
        ) {
            throw new Exception('OutputColumn must be an EnumOutputField');
        }
    }

    public static function create(
        EnumOutputType $enumOutputType,
        array $arrOptions = []
    )
    {
        switch ($enumOutputType->getId()) {
            case EnumOutputType::OUTPUT_COUNT:
                return new ModelOutputCount($enumOutputType);
            case EnumOutputType::OUTPUT_PIVOT:
                return new ModelOutputPivot(
                    $enumOutputType,
                    $arrOptions
                );
            case EnumOutputType::OUTPUT_LIST:
                return new ModelOutputList(
                    $enumOutputType,
                    $arrOptions
                );
            default:
                throw new Exception('Invalid output type');
        }
    }

    public function getType()
    {
        return $this->_enumOutputType->getId();
    }
}
