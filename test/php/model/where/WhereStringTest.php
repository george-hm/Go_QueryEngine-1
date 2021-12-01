<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;

class WhereStringTest extends \TestCase
{
    function testMapping()
    {
        $mockEnumWhereHostname = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_HOSTNAME)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumWhereHostname);

        $this->assertInstanceOf(ModelWhereString::class, $modelWhereString);

        $mockEnumTradingPostcode = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_TRADING_POSTCODE)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumTradingPostcode);

        $this->assertInstanceOf(ModelWhereString::class, $modelWhereString);


        $mockEnumRegisteredPostcode = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_REGISTERED_POSTCODE)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumRegisteredPostcode);

        $this->assertInstanceOf(ModelWhereString::class, $modelWhereString);

        $mockEnumJobRoles = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_JOB_ROLES)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumJobRoles);

        $this->assertInstanceOf(ModelWhereString::class, $modelWhereString);

        $mockEnumSiccodes = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_SICCODES)
            ->mock();

        $modelWhereString = ModelWhereAbstract::create($mockEnumSiccodes);

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
