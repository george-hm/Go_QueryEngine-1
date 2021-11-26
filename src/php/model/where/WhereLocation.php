<?php

namespace GoQueryEngine\Model\Where;

use Exception;
use GoQueryEngine\Enum\EnumOperators;

class ModelWhereLocation extends ModelWhereAbstract
{
    public function setRadius(int $intRadius) {
        $this->_arrWhere[EnumOperators::VALUE_WITHIN]
            [EnumOperators::VALUE_WITHIN_RADIUS] = $intRadius;
    }

    public function setLat(float $floatLat) {
        $this->_arrWhere[EnumOperators::VALUE_WITHIN]
            [EnumOperators::VALUE_WITHIN_LAT] = $floatLat;
    }

    public function setLng(float $floatLng) {
        $this->_arrWhere[EnumOperators::VALUE_WITHIN]
            [EnumOperators::VALUE_WITHIN_LNG] = $floatLng;
    }

    public function toArray()
    {
        if (
            !isset($this->_arrWhere[EnumOperators::VALUE_WITHIN]) ||
            !isset($this->_arrWhere[EnumOperators::VALUE_WITHIN]['radius']) ||
            !isset($this->_arrWhere[EnumOperators::VALUE_WITHIN]
                [EnumOperators::VALUE_WITHIN_LAT]) ||
            !isset($this->_arrWhere[EnumOperators::VALUE_WITHIN]
                [EnumOperators::VALUE_WITHIN_LNG])
        ) {
            throw new Exception('You must set the radius, lat and lng before calling toArray()');
        }

        return $this->_arrWhere;
    }
}
