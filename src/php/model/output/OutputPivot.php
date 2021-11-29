<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputType;

class ModelOutputPivot extends ModelOutputAbstract
{
    public function __construct($enumOutputType, $arrOutput)
    {
        if (!count($arrOutput)) {
            throw new \Exception('OutputPivot requires an output array');
        }

        if (
            !$arrOutput[EnumOutputType::OUTPUT_SETTING_ROW] ||
            !$arrOutput[EnumOutputType::OUTPUT_SETTING_COLUMN]
        ) {
            throw new \Exception('OutputPivot requires a row and column');
        }

        $this->_enumOutputType = $enumOutputType;
        $this->_arrOutput = $arrOutput;
    }

    public function getRow()
    {
        return $this->_arrOutput['OutputRow'];
    }

    public function getColumn()
    {
        return $this->_arrOutput['OutputColumn'];
    }
}
