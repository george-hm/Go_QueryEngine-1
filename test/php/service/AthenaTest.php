<?php

namespace GoQueryEngine\Service;

use Exception;
use GoQueryEngine\Model\Output\ModelOutputCount;
use GoQueryEngine\Model\Where\ModelWhereString;

class ServiceAthenaTest extends \TestCase
{
    function testGetInstance()
    {
        $strBaseURL = 'http://localhost:8080';
        $serviceAthena = ServiceAthena::getInstance($strBaseURL);
        $this->assertInstanceOf(
            ServiceAthena::class,
            $serviceAthena
        );
    }

    function testGetInstanceNoBaseURL()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Base URL cannot be empty');
        ServiceAthena::getInstance('');
    }

    function testSetToken()
    {
        $strBaseURL = 'http://localhost:8080';
        $serviceAthena = ServiceAthena::getInstance($strBaseURL);
        $strToken = 'testToken';
        $serviceAthena->setToken($strToken);
        $this->assertEquals(
            $strToken,
            $serviceAthena->_strToken
        );
    }

    function testSetOutput()
    {
        $strBaseURL = 'http://localhost:8080';
        $serviceAthena = ServiceAthena::getInstance($strBaseURL);

        $mockModelOutputAbstract = \Mockery::mock(ModelOutputCount::class)
            ->shouldReceive('create')
            ->mock();

        $serviceAthena->setOutput($mockModelOutputAbstract);
        $this->assertEquals(
            $mockModelOutputAbstract,
            $serviceAthena->_modelOutputAbstract
        );
    }

    function testLookup()
    {
        $strBaseURL = 'http://localhost:8080';
        $serviceAthena = ServiceAthena::getInstance($strBaseURL);

        $strOutputType = 'count';
        $mockModelOutputAbstract = \Mockery::mock(ModelOutputCount::class)
            ->shouldReceive('getType')
            ->once()
            ->andReturn($strOutputType)
            ->mock();

        $serviceAthena->setOutput($mockModelOutputAbstract);
        $serviceAthena->setToken('testToken');

        $arrMockWhereReturn = [
            'name' => 'testName',
            'equals' => 1
        ];
        $mockModelWhereString = \Mockery::mock(ModelWhereString::class)
            ->shouldReceive('toArray')
            ->withNoArgs()
            ->andReturn($arrMockWhereReturn)
            ->once()
            ->mock();

        $serviceAthena->addWhere($mockModelWhereString);

        $strCallbackURL = 'http://localhost:8080/callback';
        $serviceAthena->setCallbackURL($strCallbackURL)
            ->setBUnique(true)
            ->setBInternal(true);

        $arrExpectedRequest = [
            'type' => $strOutputType,
            'where' => [$arrMockWhereReturn],
            'use_internal' => true,
            'unique_companies' => true,
            'callback_url' => $strCallbackURL,
            'json' => 1
        ];

        $mockGuzzle = \Mockery::mock('GuzzleHttp\Client')
            ->shouldReceive('request')
            ->once()
            ->with(
                'POST',
                ServiceAthena::c_strURL_Athena,
                ['json' => $arrExpectedRequest]
            )
            ->mock();

        $serviceAthena->injectGuzzle($mockGuzzle);

        $serviceAthena->lookup();
    }
}
