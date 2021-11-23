<?php

namespace GoQueryEngine\Enum;

class EnumOutputField extends EnumAbstract
{
    const TYPE_STRING = 'string';
    const TYPE_EMPLOYEE_RANGE = 'employee_range';

    const OUTPUT_HOSTNAME = 'hostname';
    const OUTPUT_EMPLOYEE_RANGE = 'noemployeerange';

    const VALUES = [
        self::OUTPUT_HOSTNAME,
        self::OUTPUT_EMPLOYEE_RANGE
    ];

    const FIELD_TYPES = [
        self::OUTPUT_HOSTNAME => self::TYPE_STRING,
        self::OUTPUT_EMPLOYEE_RANGE => self::TYPE_EMPLOYEE_RANGE
    ];

    public function getType()
    {
        return self::FIELD_TYPES[$this->getId()];
    }
}
