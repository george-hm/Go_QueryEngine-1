<?php

namespace GoQueryEngine\Model\Where;

use Exception;
use GoQueryEngine\Enum\EnumOperators;

class ModelWhereLocation extends ModelWhereAbstract
{
    public function setRadius(float $floatRadius)
    {
        $this->_arrWhere[EnumOperators::VALUE_WITHIN]
            [EnumOperators::VALUE_WITHIN_RADIUS] = $floatRadius;

        return $this;
    }

    public function setLat(float $floatLat)
    {
        $this->_arrWhere[EnumOperators::VALUE_WITHIN]
            [EnumOperators::VALUE_WITHIN_LAT] = $floatLat;

        return $this;
    }

    public function setLng(float $floatLng)
    {
        $this->_arrWhere[EnumOperators::VALUE_WITHIN]
            [EnumOperators::VALUE_WITHIN_LNG] = $floatLng;

        return $this;
    }

    public function toArray()
    {
        // make sure all the values have been set
        if (
            !isset($this->_arrWhere[EnumOperators::VALUE_WITHIN]) ||
            !isset(
                $this->_arrWhere[EnumOperators::VALUE_WITHIN]
                    [EnumOperators::VALUE_WITHIN_RADIUS]
            ) ||
            !isset(
                $this->_arrWhere[EnumOperators::VALUE_WITHIN]
                    [EnumOperators::VALUE_WITHIN_LAT]
            ) ||
            !isset(
                $this->_arrWhere[EnumOperators::VALUE_WITHIN]
                    [EnumOperators::VALUE_WITHIN_LNG]
            )
        ) {
            throw new Exception(
                'You must set the radius, lat and lng before calling toArray()'
            );
        }

        return $this->_arrWhere;
    }
}
