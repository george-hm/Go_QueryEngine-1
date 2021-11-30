<?php

namespace GoQueryEngine\Service;

use Exception;
use GoQueryEngine\Model\Output\ModelOutputCount;
use GoQueryEngine\Model\Output\ModelOutputList;
use GoQueryEngine\Model\Output\ModelOutputPivot;
use GoQueryEngine\Model\Where\ModelWhereString;

class ServiceAthenaTest extends \TestCase
{

    protected function _postTearDown()
    {
        ServiceAthena::reset();
    }

    public function testInject()
    {
        $strFakeInstance = 'fakeinstance';

        ServiceAthena::inject($strFakeInstance);

        $this->assertEquals(
            $strFakeInstance,
            ServiceAthena::getInstance('baseurl')
        );

        ServiceAthena::reset();
    }

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
            ->times(3)
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

    function testLookupTypePivot()
    {
        $strBaseURL = 'http://localhost:8080';
        $serviceAthena = ServiceAthena::getInstance($strBaseURL);

        $strOutputType = 'pivot';
        $strColumn = 'testColumn';
        $strRow = 'testRow';
        $mockModelOutputAbstract = \Mockery::mock(ModelOutputPivot::class)
            ->shouldReceive('getType')
            ->times(3)
            ->andReturn($strOutputType)
            ->shouldReceive('getColumn')
            ->andReturn($strColumn)
            ->shouldReceive('getRow')
            ->andReturn($strRow)
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
            'json' => 1,
            'column' => $strColumn,
            'row' => $strRow
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

    function testLookupTypeList()
    {
        $strBaseURL = 'http://localhost:8080';
        $serviceAthena = ServiceAthena::getInstance($strBaseURL);

        $strOutputType = 'list';
        $strColumn = 'testColumn';
        $mockModelOutputAbstract = \Mockery::mock(ModelOutputList::class)
            ->shouldReceive('getType')
            ->times(3)
            ->andReturn($strOutputType)
            ->shouldReceive('getColumn')
            ->andReturn($strColumn)
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
            'json' => 1,
            'out_fields' => [
                $strColumn
            ]
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
