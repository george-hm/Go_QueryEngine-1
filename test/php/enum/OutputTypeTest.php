<?php

namespace GoQueryEngine\Enum;

class OutputTypeTest extends \TestCase
{

    function testGetAllowedValues()
    {
        $this->assertEquals(
            [
                EnumOutputType::OUTPUT_COUNT,
                EnumOutputType::OUTPUT_PIVOT,
                EnumOutputType::OUTPUT_LIST,
                EnumOutputType::OUTPUT_SETTING_ROW,
                EnumOutputType::OUTPUT_SETTING_COLUMN
            ],
            EnumOutputType::getAllowedValues()
        );
    }

    function testReturnedValues()
    {
        $this->assertEquals(
            'count',
            EnumOutputType::OUTPUT_COUNT
        );
        $this->assertEquals(
            'pivot',
            EnumOutputType::OUTPUT_PIVOT
        );
        $this->assertEquals(
            'list',
            EnumOutputType::OUTPUT_LIST
        );
        $this->assertEquals(
            'OutputRow',
            EnumOutputType::OUTPUT_SETTING_ROW
        );
        $this->assertEquals(
            'OutputColumn',
            EnumOutputType::OUTPUT_SETTING_COLUMN
        );
    }
}
