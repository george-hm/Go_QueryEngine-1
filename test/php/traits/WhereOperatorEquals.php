<?php

namespace GoQueryEngine\Traits;

use Exception;

class WhereOperatorEqualsTest extends \TestCase
{
    function testEquals()
    {
        $modelTestOperator = new Test_WhereOperatorEquals();
        $strTestValue = 'testingValue';

        $modelTestOperator->equals($strTestValue);
        $modelTestOperator->equals($strTestValue);

        $this->assertEquals(
            $strTestValue,
            $modelTestOperator->_arrWhere['equals']
        );
    }
}

class Test_WhereOperatorEquals
{
    use TraitOperatorEquals;
}
