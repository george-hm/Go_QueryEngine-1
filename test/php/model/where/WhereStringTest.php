<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;

class WhereStringTest extends \TestCase
{
    function testMapping()
    {
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_HOSTNAME)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumWhereString);

        $this->assertInstanceOf(ModelWhereString::class, $modelWhereString);
    }

    function testIn()
    {
        $strTestingId = EnumOutputField::OUTPUT_HOSTNAME;
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
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
        $strTestingId = EnumOutputField::OUTPUT_HOSTNAME;
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
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
        $strTestingId = EnumOutputField::OUTPUT_HOSTNAME;
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
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
