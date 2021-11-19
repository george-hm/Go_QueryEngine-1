<?php

namespace GoQueryEngine\Enum;

use TestCase;

class StubEnum extends EnumAbstract
{
    const VALUE_A = "Value A";

    const VALUES = [self::VALUE_A];
}

class StubEmptyEnum extends EnumAbstract
{
    const VALUES = [];
}

class EnumAbstractTest extends TestCase
{
    function testGetAllowedValues()
    {
        $this->assertEquals(
            [StubEnum::VALUE_A],
            StubEnum::getAllowedValues()
        );
    }

    function testGetAllowedValues_Empty()
    {
        $this->expectException(\Exception::class);

        StubEmptyEnum::getAllowedValues();
    }

    function testConstruct()
    {
        $enum = new StubEnum(StubEnum::VALUE_A);

        $this->assertEquals(
            StubEnum::VALUE_A,
            $enum->getId()
        );
    }

    function testConstruct_Invalid()
    {
        $this->expectException(\Exception::class);

        $enum = new StubEnum("Something else");
    }
}
