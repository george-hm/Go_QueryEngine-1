<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOperators;
use GoQueryEngine\Enum\EnumAbstract;
use GoQueryEngine\Enum\EnumOutputField;
use Exception;

class ModelWhereIn extends ModelWhereAbstract
{

    public function __construct(
        EnumOutputField $enumOutputField,
        string $strEnumValidator
    )
    {
        parent::__construct($enumOutputField);
        $this->_strEnumValidator = $strEnumValidator;
    }

    public function in(array $arrValues)
    {
        foreach ($arrValues as $enumValue) {
            if (
                is_string($enumValue) ||
                get_class($enumValue) !== $this->_strEnumValidator
            ) {
                throw new Exception('Invalid value type');
            }

            $this->_arrWhere[EnumOperators::VALUE_IN][] =
                $enumValue->getId();
        }

        return $this;
    }

    public function notIn(array $arrValues)
    {
        foreach ($arrValues as $enumValue) {
            if (
                is_string($enumValue) ||
                get_class($enumValue) !== $this->_strEnumValidator
            ) {
                throw new Exception('Invalid value type');
            }

            $this->_arrWhere[EnumOperators::VALUE_NOT_IN][] =
                $enumValue->getId();
        }

        return $this;
    }

    public function toArray()
    {
        if (
            !isset($this->_arrWhere[EnumOperators::VALUE_IN]) &&
            !isset($this->_arrWhere[EnumOperators::VALUE_NOT_IN])
        ) {
            throw new Exception(
                "Must have at least 'in' or 'notIn' called"
            );
        }

        return $this->_arrWhere;
    }
}
