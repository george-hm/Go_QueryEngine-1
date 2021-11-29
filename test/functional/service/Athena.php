<?php

namespace GoQueryEngine\Service;

use GoQueryEngine\Enum\EnumEmployeeRange;
use GoQueryEngine\Enum\EnumOutputField;
use GoQueryEngine\Enum\EnumOutputType;
use GoQueryEngine\Model\Output\ModelOutputAbstract;
use GoQueryEngine\Model\Where\ModelWhereAbstract;

class FunctionalTest_Athena extends \GoQueryEngine\Functional_TestCase
{
    private static $strBaseURL = 'http://www.example.com/';
    private static $strToken = '12345';

    public function testLookup()
    {
        $enumType = new EnumOutputType(EnumOutputType::OUTPUT_PIVOT);
        $modelOutput = ModelOutputAbstract::create(
            $enumType,
            [
                EnumOutputType::OUTPUT_SETTING_COLUMN => new EnumOutputField(
                    EnumOutputField::OUTPUT_EMPLOYEE_RANGE
                ),
                EnumOutputType::OUTPUT_SETTING_ROW => new EnumOutputField(
                    EnumOutputField::OUTPUT_HOSTNAME
                )
            ]
        );
        $enumField = new EnumOutputField(EnumOutputField::OUTPUT_EMPLOYEE_RANGE);
        $modelWhereEmployeeRange = ModelWhereAbstract::create($enumField)
            ->in([
                new EnumEmployeeRange(EnumEmployeeRange::RANGE_1),
                new EnumEmployeeRange(EnumEmployeeRange::RANGE_1001_5000)
            ])->notIn([
                new EnumEmployeeRange(EnumEmployeeRange::RANGE_11_50)
            ]);

        $modelWhereLocation = ModelWhereAbstract::create(new EnumOutputField(EnumOutputField::OUTPUT_LOCATION))
            ->setLat(1.23)
            ->setLng(4.56)
            ->setRadius(10);

        $modelWhereHostname = ModelWhereAbstract::create(new EnumOutputField(EnumOutputField::OUTPUT_HOSTNAME))
            ->equals('www.example.com')
            ->regexp('/^www\.example\.com$/');

        $serviceAthena = ServiceAthena::getInstance(self::$strBaseURL);
        $serviceAthena->setToken(self::$strToken)
            ->setOutput($modelOutput)
            ->addWhere($modelWhereEmployeeRange)
            ->addWhere($modelWhereHostname)
            ->addWhere($modelWhereLocation)
            ->setBInternal(true)
            ->setBUnique(true)
            ->setCallbackURL('https://www.example.com?id=123')
            ->lookup();
    }
}
