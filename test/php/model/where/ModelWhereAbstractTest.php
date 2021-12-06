<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;

class ModelWhereAbstractTest extends \TestCase
{
    function testCreateNoMapping()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid output type');

        $mockEnumOutputField = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn('invalidType')
            ->mock();

        ModelWhereAbstract::create($mockEnumOutputField);
    }

    function testToArrayNoCalls()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            'ModelWhere GoQueryEngine\Model\Where\ModelWhereString is empty, ' .
            'call one of the add methods'
        );

        $mockEnumOutputField = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_HOSTNAME)
            ->mock();

        $modelWhere = ModelWhereAbstract::create($mockEnumOutputField);
        $modelWhere->toArray();
    }
}
