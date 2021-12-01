<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Enum\EnumEmployeeRange;

class WhereInTest extends \TestCase
{
    function testMapping()
    {
        $mockEnumOutputEmployeeRange = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_EMPLOYEE_RANGE)
            ->mock();

        $modelWhereEmployeeRange = ModelWhereAbstract::create(
            $mockEnumOutputEmployeeRange
        );

        $this->assertInstanceOf(
            ModelWhereIn::class,
            $modelWhereEmployeeRange
        );
    }

    function testIn()
    {
        $mockEnumOutputEmployeeRange = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_EMPLOYEE_RANGE)
            ->mock();

        $modelWhereEmployeeRange = new ModelWhereIn(
            $mockEnumOutputEmployeeRange,
            'Mockery_2_GoQueryEngine_Enum_EnumEmployeeRange'
        );

        $strMockRange = '2-10';
        $mockEnumEmployeeRange = \Mockery::mock(EnumEmployeeRange::class)
            ->shouldReceive('getId')
            ->andReturn('2-10')
            ->mock();
        $modelWhereEmployeeRange->in([
            $mockEnumEmployeeRange
        ]);

        $this->assertEquals(
            $strMockRange,
            $modelWhereEmployeeRange->toArray()['in'][0]
        );
    }

    function testInInvalidType()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid value type');

        $mockEnumOutputEmployeeRange = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_EMPLOYEE_RANGE)
            ->mock();

        $modelWhereEmployeeRange = new ModelWhereIn(
            $mockEnumOutputEmployeeRange,
            'Mockery_2_GoQueryEngine_Enum_EnumEmployeeRange'
        );

        $modelWhereEmployeeRange->in([
            'invalid'
        ]);
    }

    function testNotIn()
    {
        $mockEnumOutputEmployeeRange = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_EMPLOYEE_RANGE)
            ->mock();

        $modelWhereEmployeeRange = new ModelWhereIn(
            $mockEnumOutputEmployeeRange,
            'Mockery_2_GoQueryEngine_Enum_EnumEmployeeRange'
        );

        $strMockRange = '2-10';
        $mockEnumEmployeeRange = \Mockery::mock(EnumEmployeeRange::class)
            ->shouldReceive('getId')
            ->andReturn('2-10')
            ->mock();
        $modelWhereEmployeeRange->notIn([
            $mockEnumEmployeeRange
        ]);

        $this->assertEquals(
            $strMockRange,
            $modelWhereEmployeeRange->toArray()['not_in'][0]
        );
    }

    function testNotInInvalidType()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid value type');

        $mockEnumOutputEmployeeRange = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_EMPLOYEE_RANGE)
            ->mock();

        $modelWhereEmployeeRange = new ModelWhereIn(
            $mockEnumOutputEmployeeRange,
            'Mockery_2_GoQueryEngine_Enum_EnumEmployeeRange'
        );

        $modelWhereEmployeeRange->notIn([
            'invalid'
        ]);
    }
}
