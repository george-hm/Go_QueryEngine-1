<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputType;

class ModelOutputList extends ModelOutputAbstract
{
    public function __construct($enumOutputType, $arrOptions)
    {
        if (
            !isset($arrOptions[EnumOutputType::OUTPUT_SETTING_COLUMN])
        ) {
            throw new \Exception("OutputList requires an 'OutputColumn'");
        }

        parent::__construct(
            $enumOutputType,
            $arrOptions
        );
    }

    public function getColumn()
    {
        return $this->_arrOptions[EnumOutputType::OUTPUT_SETTING_COLUMN]
            ->getId();
    }
}
