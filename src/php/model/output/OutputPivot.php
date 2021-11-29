<?php

namespace GoQueryEngine\Model\Output;

class ModelOutputPivot extends ModelOutputAbstract
{
    public function __construct($enumOutputType, $arrOutput)
    {
        if (!count($arrOutput)) {
            throw new \Exception('OutputPivot requires an output array');
        }

        if (!$arrOutput['OutputRow'] || !$arrOutput['OutputColumn']) {
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
