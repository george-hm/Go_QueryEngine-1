<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputType;

class ModelOutputPivot extends ModelOutputAbstract
{
    public function __construct($enumOutputType, $arrOutput)
    {
        if (
            !isset($arrOutput[EnumOutputType::OUTPUT_SETTING_ROW]) ||
            !isset($arrOutput[EnumOutputType::OUTPUT_SETTING_COLUMN])
        ) {
            throw new \Exception('OutputPivot requires a row and column');
        }

        parent::__construct(
            $enumOutputType,
            $arrOutput
        );
    }

    public function getRow()
    {
        return $this->_arrOptions
            [EnumOutputType::OUTPUT_SETTING_ROW]->getId();
    }

    public function getColumn()
    {
        return $this->_arrOptions
            [EnumOutputType::OUTPUT_SETTING_COLUMN]->getId();
    }
}
