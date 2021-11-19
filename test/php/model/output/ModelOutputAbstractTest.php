<?php

namespace GoQueryEngine\Model\Output;

use Exception;
use GoQueryEngine\Enum\EnumOutputType;
use Mockery;

class ModelOutputAbstractTest extends \TestCase
{
    public function testCreateNoMapping()
    {
        $this->expectException(Exception::class);

        $mockEnumOutputType = Mockery::mock(EnumOutputType::class)
            ->shouldReceive('getId')
            ->andReturn('invalidTestId')
            ->mock();

        ModelOutputAbstract::create($mockEnumOutputType);
    }
}
