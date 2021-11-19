<?php

namespace GoQueryEngine\Service;

use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Enum\EnumOutputType;
use GoQueryEngine\Model\Output\ModelOutputAbstract;
use GoQueryEngine\Model\Where\ModelWhereAbstract;

class FunctionalTest_Athena extends \GoQueryEngine\Functional_TestCase
{
    private static $strBaseURL = 'http://localhost/canddi/';
    private static $strToken = '12345';

    public function testLookup()
    {
        $enumType = new EnumOutputType(EnumOutputType::OUTPUT_COUNT);
        $modelOutput = ModelOutputAbstract::create($enumType);
        $enumField = new EnumOutputField(EnumOutputField::OUTPUT_HOSTNAME);
        $modelWhere = ModelWhereAbstract::create($enumField);
        $modelWhere->like('foo')->equals('foo');

        $serviceAthena = ServiceAthena::getInstance(self::$strBaseURL);
        $serviceAthena->setToken(self::$strToken)
            ->setOutput($modelOutput)
            ->addWhere($modelWhere)
            ->setBInternal(true)
            ->setBUnique(true)
            ->lookup();
    }
}
