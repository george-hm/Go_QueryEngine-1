<?php

namespace GoQueryEngine\Traits;

trait TraitOperatorEquals
{
    public final function equals($mixValue)
    {
        $this->_arrWhere['equals'] = $mixValue;
        return $this;
    }
}
