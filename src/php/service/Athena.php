<?php

namespace GoQueryEngine\Service;
use Exception;
use GoQueryEngine\Enum\EnumOutputType;
use GuzzleHttp\Client as GuzzleClient;
use GoQueryEngine\Model\Output\ModelOutputAbstract;
use GoQueryEngine\Model\Where\ModelWhereAbstract;

class ServiceAthena
{
    const c_strURL_Athena = '/prodcloud/athena_query';
    private static $_instance;
    private static $_guzzleConnection;
    private $_arrWhere = [];
    private $_bInternal = false;
    private $_bUnique = false;
    private $_strCBURL = '';

    private function __construct(string $strBaseURL)
    {
        if (empty($strBaseURL)) {
            throw new Exception('Base URL cannot be empty');
        }

        $this->_strBaseURL = $strBaseURL;
    }

    public static function getInstance(string $strBaseURL)
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }

        self::$_instance = new ServiceAthena($strBaseURL);
        return self::$_instance;
    }

    public static function inject(
        $instance
    )
    {
        self::$_instance = $instance;
    }

    public static function reset()
    {
        self::$_instance = null;
    }

    public function setToken(string $strToken)
    {
        $this->_strToken = $strToken;
        return $this;
    }

    public function setOutput(ModelOutputAbstract $modelOutputAbstract)
    {
        $this->_modelOutputAbstract = $modelOutputAbstract;
        return $this;
    }

    public function addWhere(ModelWhereAbstract $modelWhereAbstract)
    {
        $this->_arrWhere[] = $modelWhereAbstract;
        return $this;
    }

    public function setBInternal(bool $bInternal)
    {
        $this->_bInternal = $bInternal;
        return $this;
    }

    public function setBUnique(bool $bUnique)
    {
        $this->_bUnique = $bUnique;
        return $this;
    }

    public function setCallbackURL(string $strCBURL)
    {
        $this->_strCBURL = $strCBURL;
        return $this;
    }

    public function lookup()
    {
        // validate token, baseurl, wheres, outputtype
        if (empty($this->_strBaseURL)) {
            throw new Exception('Base URL cannot be empty');
        }
        if (empty($this->_strToken)) {
            throw new Exception('Token cannot be empty');
        }
        if (empty($this->_modelOutputAbstract)) {
            throw new Exception('Output type cannot be empty');
        }
        if (count($this->_arrWhere) === 0) {
            throw new Exception('Where cannot be empty');
        }
        // get guzzle connection

        $guzzleConnection = $this->_getGuzzle(
            $this->_strBaseURL,
            $this->_strToken
        );

        $arrWhereMapped = [];
        foreach ($this->_arrWhere as $mdlCurrentWhere) {
            $arrWhereMapped[] = $mdlCurrentWhere->toArray();
        }

        $arrBody = [
            'type' => $this->_modelOutputAbstract->getType(),
            'where' => $arrWhereMapped,
            'use_internal' => $this->_bInternal,
            'unique_companies' => $this->_bUnique,
            'callback_url' => $this->_strCBURL,
            'json' => true,
        ];

        if (
            $this->_modelOutputAbstract->getType() ===
                EnumOutputType::OUTPUT_PIVOT
        ) {
            $arrBody['row'] = $this->_modelOutputAbstract->getRow();
            $arrBody['column'] = $this->_modelOutputAbstract->getColumn();
        }

        if (
            $this->_modelOutputAbstract->getType() ===
                EnumOutputType::OUTPUT_LIST
        ) {
            $arrBody['out_fields'][] = $this->_modelOutputAbstract->getColumn();
        }

        $guzzleConnection->request(
            'POST',
            self::c_strURL_Athena,
            [
                'json' => $arrBody,
            ]
        );
    }

    /**
     * Used for testing
     *      This injects in a GuzzleConnection so we can
     *      mock this
     *
     * @param \GuzzleHttp\Client $guzzleConnection
     **/
    public static function injectGuzzle(
        GuzzleClient $guzzleConnection
    )
    {
        self::$_guzzleConnection    = $guzzleConnection;
    }

    protected static function _getGuzzle($strBaseUri, $strAccessToken)
    : GuzzleClient
    {
        if (!self::$_guzzleConnection) {
            $arrDefaults                = [
                'base_uri'              => $strBaseUri,
                'method'                => 'POST',
                'timeout'               => 10,
                'connect_timeout'       => 10,
                'headers'               => [
                    'Accept'            => 'application/json',
                    'Accept-Encoding'   => 'gzip, deflate',
                    'Authorization'     => $strAccessToken
                ],
                "verify"                => false
            ];
            self::$_guzzleConnection    = new GuzzleClient($arrDefaults);
        }

        return self::$_guzzleConnection;
    }
}
