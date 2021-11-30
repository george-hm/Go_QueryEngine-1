<?php

namespace GoQueryEngine\Model\Output;

use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Enum\EnumOutputType;
use GoQueryEngine\Model\Output\ModelOutputAbstract;
use Exception;

class OutputListTest extends \TestCase
{
    public function testCreateInvalidColumn()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('OutputColumn must be an EnumOutputField');
        $enumOutputList = new EnumOutputType(EnumOutputType::OUTPUT_LIST);
        $modelOutputList = ModelOutputAbstract::create(
            $enumOutputList,
            [
                'OutputColumn' => 2
            ]
        );

        $this->assertInstanceOf(ModelOutputList::class, $modelOutputList);
    }

    public function testCreateNoOptions()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("OutputList requires an 'OutputColumn'");

        $enumOutputList = new EnumOutputType(EnumOutputType::OUTPUT_LIST);
        $modelOutputList = ModelOutputAbstract::create($enumOutputList);

        $this->assertEquals(
            'list',
            $modelOutputList->getType()
        );
    }

    public function testCreate()
    {
        $enumOutputList = new EnumOutputType(EnumOutputType::OUTPUT_LIST);
        $modelOutputList = ModelOutputAbstract::create(
            $enumOutputList,
            [
                'OutputColumn' => new EnumOutputField(
                    EnumOutputField::OUTPUT_EMPLOYEE_RANGE
                ),
            ]
        );

        $this->assertInstanceOf(ModelOutputList::class, $modelOutputList);
        $this->assertEquals(
            'list',
            $modelOutputList->getType()
        );
        $this->assertEquals(
            EnumOutputField::OUTPUT_EMPLOYEE_RANGE,
            $modelOutputList->getColumn()
        );
    }
}
