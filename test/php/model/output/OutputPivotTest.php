<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Enum\EnumOutputType;
use GoQueryEngine\Model\Output\ModelOutputAbstract;
use Exception;

class OutputPivotTest extends \TestCase
{
    public function testCreateInvalidrow()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('OutputRow must be an EnumOutputField');
        $enumOutputPivot = new EnumOutputType(EnumOutputType::OUTPUT_PIVOT);
        $modelOutputPivot = ModelOutputAbstract::create(
            $enumOutputPivot,
            [
                'OutputRow' => 1,
                'OutputColumn' => 2
            ]
        );

        $this->assertInstanceOf(ModelOutputPivot::class, $modelOutputPivot);
    }

    public function testCreateInvalidColumn()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('OutputColumn must be an EnumOutputField');
        $enumOutputPivot = new EnumOutputType(EnumOutputType::OUTPUT_PIVOT);
        $modelOutputPivot = ModelOutputAbstract::create(
            $enumOutputPivot,
            [
                'OutputRow' => new EnumOutputField(
                    EnumOutputField::OUTPUT_EMPLOYEE_RANGE
                ),
                'OutputColumn' => 1
            ]
        );

        $this->assertInstanceOf(ModelOutputPivot::class, $modelOutputPivot);
    }

    public function testCreateNoOptions()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('OutputPivot requires a row and column');

        $enumOutputPivot = new EnumOutputType(EnumOutputType::OUTPUT_PIVOT);
        $modelOutputPivot = ModelOutputAbstract::create($enumOutputPivot);

        $this->assertEquals(
            'pivot',
            $modelOutputPivot->getType()
        );
    }
}
