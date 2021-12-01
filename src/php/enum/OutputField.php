<?php

namespace GoQueryEngine\Enum;

class EnumOutputField extends EnumAbstract
{
    const OUTPUT_HOSTNAME = 'hostname';
    const OUTPUT_EMPLOYEE_RANGE = 'noemployeerange';
    const OUTPUT_LOCATION = 'location';
    const OUTPUT_TRADING_POSTCODE = 'tradingpostcode';
    const OUTPUT_REGISTERED_POSTCODE = 'regofficepostcode';
    const OUTPUT_MASTER_SECTORS = 'mastersectors';
    const OUTPUT_JOB_ROLES = 'normaljobroles';
    const OUTPUT_SICCODES = 'siccodes';
    const OUTPUT_CITY = 'city';

    const VALUES = [
        self::OUTPUT_HOSTNAME,
        self::OUTPUT_EMPLOYEE_RANGE,
        self::OUTPUT_LOCATION,
        self::OUTPUT_TRADING_POSTCODE,
        self::OUTPUT_REGISTERED_POSTCODE,
        self::OUTPUT_MASTER_SECTORS,
        self::OUTPUT_JOB_ROLES,
        self::OUTPUT_SICCODES,
        self::OUTPUT_CITY
    ];
}
