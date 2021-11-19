<?php

namespace GoQueryEngine\Enum;

use TestCase;

class OutputFieldTest extends TestCase
{

    function testGetAllowedValues()
    {
        $this->assertEquals(
            [
                EnumOutputField::OUTPUT_HOSTNAME
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
    }
}
