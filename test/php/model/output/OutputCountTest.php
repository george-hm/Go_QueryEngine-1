<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputType;
use GoQueryEngine\Model\Output\ModelOutputAbstract;

class OutputCountTest extends \TestCase
{
    public function testCreateMapping()
    {
        $enumOutputCount = new EnumOutputType(EnumOutputType::OUTPUT_COUNT);
        $modelOutputCount = ModelOutputAbstract::create($enumOutputCount);

        $this->assertInstanceOf(ModelOutputCount::class, $modelOutputCount);
    }

    public function testGetType()
    {
        $enumOutputCount = new EnumOutputType(EnumOutputType::OUTPUT_COUNT);
        $modelOutputCount = ModelOutputAbstract::create($enumOutputCount);

        $this->assertEquals(
            'count',
            $modelOutputCount->getType()
        );
    }
}
