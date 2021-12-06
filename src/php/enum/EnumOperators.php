<?php

namespace GoQueryEngine\Enum;

class EnumOperators extends EnumAbstract
{
    const VALUE_EQUALS = 'equals';
    const VALUE_IN = 'in';
    const VALUE_NOT_IN = 'not_in';
    const VALUE_LIKE = 'like';
    const VALUE_REGEXP = 'regexp';
    const VALUE_WITHIN = 'within';
    const VALUE_WITHIN_RADIUS = 'radius';
    const VALUE_WITHIN_LAT = 'lat';
    const VALUE_WITHIN_LNG = 'lng';
    const VALUE_GTE = 'gte';
    const VALUE_LTE = 'lte';

    const VALUES = [
        self::VALUE_EQUALS,
        self::VALUE_IN,
        self::VALUE_NOT_IN,
        self::VALUE_LIKE,
        self::VALUE_REGEXP,
        self::VALUE_WITHIN,
        self::VALUE_WITHIN_RADIUS,
        self::VALUE_WITHIN_LAT,
        self::VALUE_WITHIN_LNG,
        self::VALUE_GTE,
        self::VALUE_LTE
    ];
}
