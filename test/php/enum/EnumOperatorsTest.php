<?php

namespace GoQueryEngine\Enum;

class EnumOperatorsTest extends \TestCase
{

    function testGetAllowedValues()
    {
        $this->assertEquals(
            [
                EnumOperators::VALUE_EQUALS,
                EnumOperators::VALUE_IN,
                EnumOperators::VALUE_NOT_IN,
                EnumOperators::VALUE_LIKE,
                EnumOperators::VALUE_REGEXP,
                EnumOperators::VALUE_WITHIN,
                EnumOperators::VALUE_WITHIN_RADIUS,
                EnumOperators::VALUE_WITHIN_LAT,
                EnumOperators::VALUE_WITHIN_LNG,
                EnumOperators::VALUE_GTE,
                EnumOperators::VALUE_LTE
            ],
            EnumOperators::getAllowedValues()
        );
    }

    function testReturnedValues()
    {
        $this->assertEquals(
            'equals',
            EnumOperators::VALUE_EQUALS
        );
        $this->assertEquals(
            'in',
            EnumOperators::VALUE_IN
        );
        $this->assertEquals(
            'not_in',
            EnumOperators::VALUE_NOT_IN
        );
        $this->assertEquals(
            'like',
            EnumOperators::VALUE_LIKE
        );
        $this->assertEquals(
            'regexp',
            EnumOperators::VALUE_REGEXP
        );
        $this->assertEquals(
            'within',
            EnumOperators::VALUE_WITHIN
        );
        $this->assertEquals(
            'radius',
            EnumOperators::VALUE_WITHIN_RADIUS
        );
        $this->assertEquals(
            'lat',
            EnumOperators::VALUE_WITHIN_LAT
        );
        $this->assertEquals(
            'lng',
            EnumOperators::VALUE_WITHIN_LNG
        );
        $this->assertEquals(
            'gte',
            EnumOperators::VALUE_GTE
        );
        $this->assertEquals(
            'lte',
            EnumOperators::VALUE_LTE
        );
    }
}
