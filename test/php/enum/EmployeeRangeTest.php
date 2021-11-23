<?php

namespace GoQueryEngine\Enum;

class EnumEmployeeRangeTest extends \TestCase
{

    function testGetAllowedValues()
    {
        $this->assertEquals(
            [
                EnumEmployeeRange::RANGE_1,
                EnumEmployeeRange::RANGE_2_10,
                EnumEmployeeRange::RANGE_11_50,
                EnumEmployeeRange::RANGE_51_200,
                EnumEmployeeRange::RANGE_201_500,
                EnumEmployeeRange::RANGE_501_1000,
                EnumEmployeeRange::RANGE_1001_5000,
                EnumEmployeeRange::RANGE_5001_10000,
                EnumEmployeeRange::RANGE_10000_PLUS
            ],
            EnumEmployeeRange::getAllowedValues()
        );
    }

    function testReturnedValues()
    {
        $this->assertEquals(
            EnumEmployeeRange::RANGE_1,
            '1'
        );
        $this->assertEquals(
            EnumEmployeeRange::RANGE_2_10,
            '2-10'
        );
        $this->assertEquals(
            EnumEmployeeRange::RANGE_11_50,
            '11-50'
        );
        $this->assertEquals(
            EnumEmployeeRange::RANGE_51_200,
            '51-200'
        );
        $this->assertEquals(
            EnumEmployeeRange::RANGE_201_500,
            '201-500'
        );
        $this->assertEquals(
            EnumEmployeeRange::RANGE_501_1000,
            '501-1000'
        );
        $this->assertEquals(
            EnumEmployeeRange::RANGE_1001_5000,
            '1001-5000'
        );
        $this->assertEquals(
            EnumEmployeeRange::RANGE_5001_10000,
            '5001-10000'
        );
        $this->assertEquals(
            EnumEmployeeRange::RANGE_10000_PLUS,
            '10000+'
        );
    }
}
