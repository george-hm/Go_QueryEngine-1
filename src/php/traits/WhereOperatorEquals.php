<?php

namespace Traits;

trait TraitOperatorEquals
{
    protected function equals($mixValue)
    {
        $this->_arrWhere['equals'] = $mixValue;
        return $this;
    }
}
