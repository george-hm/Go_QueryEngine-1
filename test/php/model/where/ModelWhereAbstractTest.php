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
}
