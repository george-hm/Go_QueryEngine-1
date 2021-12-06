<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;

class WhereNumTest extends \TestCase
{
    function testMapping()
    {
        $mockEnumWhereIncorporationDate = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_INCORPORATION_DATE)
            ->mock();

        $modelWhereNum = ModelWhereAbstract::create(
            $mockEnumWhereIncorporationDate
        );

        $this->assertInstanceOf(
            ModelWhereNum::class,
            $modelWhereNum
        );
    }

    function testGTE()
    {
        $mockEnumWhereIncorporationDate = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_INCORPORATION_DATE)
            ->mock();

        $modelWhereNum = ModelWhereAbstract::create(
            $mockEnumWhereIncorporationDate
        );

        $intValue = 1;
        $modelWhereNum->gte(
            $intValue
        );

        $this->assertEquals(
            [
                'name' => EnumOutputField::OUTPUT_INCORPORATION_DATE,
                'gte' => $intValue
            ],
            $modelWhereNum->toArray()
        );
    }

    function testLTE()
    {
        $mockEnumWhereIncorporationDate = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_INCORPORATION_DATE)
            ->mock();

        $modelWhereNum = ModelWhereAbstract::create(
            $mockEnumWhereIncorporationDate
        );

        $intValue = 1;
        $modelWhereNum->lte(
            $intValue
        );

        $this->assertEquals(
            [
                'name' => EnumOutputField::OUTPUT_INCORPORATION_DATE,
                'lte' => $intValue
            ],
            $modelWhereNum->toArray()
        );
    }
}
