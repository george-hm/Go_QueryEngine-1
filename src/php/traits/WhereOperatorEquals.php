<?php

namespace Traits;

trait TraitName
{
    protected function equals($mixValue)
    {
        $this->_arrWhere['equals'] = $mixValue;
        return $this;
    }
}
