<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Enum\EnumEmployeeRange;

class WhereEmployeeRangeTest extends \TestCase
{
    function testMapping()
    {
        $mockEnumOutputEmployeeRange = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getType')
            ->andReturn('employee_range')
            ->shouldReceive('getId')
            ->andReturn('testingId')
            ->mock();

        $modelWhereEmployeeRange = ModelWhereAbstract::create(
            $mockEnumOutputEmployeeRange
        );

        $this->assertInstanceOf(
            ModelWhereEmployeeRange::class,
            $modelWhereEmployeeRange
        );
    }

    function testIn()
    {
        $mockEnumOutputEmployeeRange = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getType')
            ->andReturn('employee_range')
            ->shouldReceive('getId')
            ->andReturn('testingId')
            ->mock();

        $modelWhereEmployeeRange = ModelWhereAbstract::create(
            $mockEnumOutputEmployeeRange
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
            ->shouldReceive('getType')
            ->andReturn('employee_range')
            ->shouldReceive('getId')
            ->andReturn('testingId')
            ->mock();

        $modelWhereEmployeeRange = ModelWhereAbstract::create(
            $mockEnumOutputEmployeeRange
        );

        $modelWhereEmployeeRange->in([
            'invalid'
        ]);
    }

    function testNotIn()
    {
        $mockEnumOutputEmployeeRange = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getType')
            ->andReturn('employee_range')
            ->shouldReceive('getId')
            ->andReturn('testingId')
            ->mock();

        $modelWhereEmployeeRange = ModelWhereAbstract::create(
            $mockEnumOutputEmployeeRange
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
            ->shouldReceive('getType')
            ->andReturn('employee_range')
            ->shouldReceive('getId')
            ->andReturn('testingId')
            ->mock();

        $modelWhereEmployeeRange = ModelWhereAbstract::create(
            $mockEnumOutputEmployeeRange
        );

        $modelWhereEmployeeRange->notIn([
            'invalid'
        ]);
    }
}
