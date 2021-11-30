<?php

namespace GoQueryEngine\Enum;

class EnumOutputType extends EnumAbstract
{
    const OUTPUT_COUNT = 'count';
    const OUTPUT_PIVOT = 'pivot';
    const OUTPUT_LIST = 'list';
    const OUTPUT_SETTING_ROW = 'OutputRow';
    const OUTPUT_SETTING_COLUMN = 'OutputColumn';

    const VALUES = [
        self::OUTPUT_COUNT,
        self::OUTPUT_PIVOT,
        self::OUTPUT_LIST,
        self::OUTPUT_SETTING_ROW,
        self::OUTPUT_SETTING_COLUMN
    ];
}
