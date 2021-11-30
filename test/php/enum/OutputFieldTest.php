<?php

namespace GoQueryEngine\Enum;

class OutputFieldTest extends \TestCase
{

    function testGetAllowedValues()
    {
        $this->assertEquals(
            [
                EnumOutputField::OUTPUT_HOSTNAME,
                EnumOutputField::OUTPUT_EMPLOYEE_RANGE,
                EnumOutputfield::OUTPUT_LOCATION,
                EnumOutputField::OUTPUT_TRADING_POSTCODE,
                EnumOutputField::OUTPUT_REGISTERED_POSTCODE
            ],
            EnumOutputField::getAllowedValues()
        );
    }

    function testReturnedValues()
    {
        $this->assertEquals(
            'hostname',
            EnumOutputField::OUTPUT_HOSTNAME
        );
        $this->assertEquals(
            'noemployeerange',
            EnumOutputField::OUTPUT_EMPLOYEE_RANGE
        );
        $this->assertEquals(
            'location',
            EnumOutputField::OUTPUT_LOCATION
        );
        $this->assertEquals(
            'tradingpostcode',
            EnumOutputField::OUTPUT_TRADING_POSTCODE
        );
        $this->assertEquals(
            'regofficepostcode',
            EnumOutputField::OUTPUT_REGISTERED_POSTCODE
        );
    }
}
