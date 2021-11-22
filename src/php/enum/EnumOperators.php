<?php

namespace GoQueryEngine\Enum;

class EnumOperators extends EnumAbstract
{
    const VALUE_EQUALS = 'equals';
    const VALUE_IN = 'in';
    const VALUE_NOT_IN = 'not_in';
    const VALUE_LIKE = 'like';
    const VALUE_REGEXP = 'regexp';

    const VALUES = [
        self::VALUE_EQUALS,
        self::VALUE_IN,
        self::VALUE_NOT_IN,
        self::VALUE_LIKE,
        self::VALUE_REGEXP,
    ];
}
