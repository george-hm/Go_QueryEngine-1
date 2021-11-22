<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;

class WhereStringTest extends \TestCase
{
    function testMapping()
    {
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getType')
            ->andReturn('string')
            ->shouldReceive('getId')
            ->andReturn('testingId')
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumWhereString);

        $this->assertInstanceOf(ModelWhereString::class, $modelWhereString);
    }

    function testIn()
    {
        $strTestingId = 'testingId';
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getType')
            ->andReturn('string')
            ->shouldReceive('getId')
            ->andReturn($strTestingId)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumWhereString);

        $arrTestIn = [
            'testValue1',
            'testValue2'
        ];
        $modelWhereString->in($arrTestIn);

        $this->assertEquals(
            $arrTestIn,
            $modelWhereString->toArray()['in']
        );
    }
    function testLike()
    {
        $strTestingId = 'testingId';
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getType')
            ->andReturn('string')
            ->shouldReceive('getId')
            ->andReturn($strTestingId)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumWhereString);

        $strTestValue = 'testvalue';
        $modelWhereString->like($strTestValue);

        $this->assertEquals(
            $strTestValue,
            $modelWhereString->toArray()['like']
        );
    }

    function testRegexp()
    {
        $strTestingId = 'testingId';
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getType')
            ->andReturn('string')
            ->shouldReceive('getId')
            ->andReturn($strTestingId)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumWhereString);

        $strTestValue = 'testvalue';
        $modelWhereString->regexp($strTestValue);

        $this->assertEquals(
            $strTestValue,
            $modelWhereString->toArray()['regexp']
        );
    }
}
