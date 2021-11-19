<?php

namespace Enum;

class EnumOutputField extends EnumAbstract
{
    const TYPE_STRING = 'string';

    const OUTPUT_HOSTNAME = 'hostname';

    const FIELDS = [
        self::OUTPUT_HOSTNAME
    ];

    const FIELD_TYPES = [
        self::OUTPUT_HOSTNAME => self::TYPE_STRING
    ];

    public function getType()
    {
        return self::FIELD_TYPES[$this->getId()];
    }
}
