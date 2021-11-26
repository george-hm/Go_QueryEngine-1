<?php

namespace GoQueryEngine\Model\Where;

use GoQueryEngine\Enum\EnumOutputField;

class WhereLocationTest extends \TestCase
{
    function testMapping()
    {
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_LOCATION)
            ->mock();

        $modelWhereLocation = ModelWhereAbstract::create($mockEnumWhereString);

        $this->assertInstanceOf(ModelWhereLocation::class, $modelWhereLocation);
    }

    function testNotAllRan() {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            'You must set the radius, lat and lng before calling toArray()'
        );

        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_LOCATION)
            ->mock();

        $modelWhereLocation = ModelWhereAbstract::create($mockEnumWhereString);
        $modelWhereLocation->toArray();
    }

    function testAllSet()
    {
        $mockEnumWhereString = \Mockery::mock(EnumOutputField::class)
            ->shouldReceive('getId')
            ->andReturn(EnumOutputField::OUTPUT_LOCATION)
            ->mock();

        $modelWhereLocation = ModelWhereAbstract::create($mockEnumWhereString);
        $floatInt = 1.2315651;
        $floatLng = 2.231123;
        $floatRadius = 3.3;
        $modelWhereLocation
            ->setLat($floatInt)
            ->setLng($floatLng)
            ->setRadius($floatRadius);

        $arrayExpected = [
            'name' => 'location',
            'within' => [
                'lat' => $floatInt,
                'lng' => $floatLng,
                'radius' => $floatRadius
            ]
        ];

        $this->assertEquals($arrayExpected, $modelWhereLocation->toArray());
    }
}
