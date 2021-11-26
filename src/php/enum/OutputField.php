<?php

namespace GoQueryEngine\Enum;

class EnumOutputField extends EnumAbstract
{
    const OUTPUT_HOSTNAME = 'hostname';
    const OUTPUT_EMPLOYEE_RANGE = 'noemployeerange';
    const OUTPUT_LOCATION = 'location';

    const VALUES = [
        self::OUTPUT_HOSTNAME,
        self::OUTPUT_EMPLOYEE_RANGE,
        self::OUTPUT_LOCATION
    ];
}
