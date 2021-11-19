<?php

namespace GoQueryEngine\Enum;

use Exception;

abstract class EnumAbstract
{
    const VALUES = [];

    private $_mixedId;

    /**
     * Returns array of all valid values on the enum
     *
     * @return array
     * @author Kathie Dart
     **/
    public static function getAllowedValues()
    {
        if (empty(static::VALUES)) {
            throw new Exception("Allowed values are empty");
        }

        return static::VALUES;
    }

    /**
     * Instantiates with an id value
     *
     * @param  mixed $mixedId
     * @return void
     * @author Kathie Dart
     **/
    public function __construct($mixedId)
    {
        if (!in_array($mixedId, static::getAllowedValues())) {
            throw new Exception("Disallowed value: ($mixedId)");
        }

        $this->_mixedId = $mixedId;
    }

    /**
     * Gets the enum's id
     *
     * @return mixed
     * @author Kathie Dart
     **/
    public function getId()
    {
        return $this->_mixedId;
    }
}
