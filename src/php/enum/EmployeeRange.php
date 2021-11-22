<?php

namespace GoQueryEngine\Enum;

class EnumEmployeeRange extends EnumAbstract
{
    const RANGE_1 = '1';
    const RANGE_2_10 = '2-10';
    const RANGE_11_50 = '11-50';
    const RANGE_51_200 = '51-200';
    const RANGE_201_500 = '201-500';
    const RANGE_501_1000 = '501-1000';
    const RANGE_1001_5000 = '1001-5000';
    const RANGE_5001_10000 = '5001-10000';
    const RANGE_10000_PLUS = '10000+';

    const VALUES = [
        self::RANGE_1,
        self::RANGE_2_10,
        self::RANGE_11_50,
        self::RANGE_51_200,
        self::RANGE_201_500,
        self::RANGE_501_1000,
        self::RANGE_1001_5000,
        self::RANGE_5001_10000,
        self::RANGE_10000_PLUS
    ];
}
