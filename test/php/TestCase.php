<?php
/**
 * Test case class to be extended by all project unit tests
 *
**/

class TestCase extends \Zend_Test_PHPUnit_ControllerTestCase
{
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    /**
     * Uses reflection to get the value of a protected or private object
     * attribute
     *
     * @param  mixed $mixedObj
     * @param  string $strAttribute
     * @return mixed
     * @author Jon Saunders
    **/
    protected function _getProtAttr($mixedObj, string $strAttribute)
    {
        $reflectionClass = new \ReflectionClass($mixedObj);

        $reflectionProperty = $reflectionClass->getProperty($strAttribute);
        $reflectionProperty->setAccessible(true);

        return $reflectionProperty->getValue($mixedObj);
    }

    /**
     * Uses reflection to invoke a protected or private method, with optional
     * arguments
     *
     * @param  mixed $mixedObj
     * @param  string $strMethodName
     * @param  array $arrArguments
     * @return mixed
     * @author Jon Saunders
    **/
    protected function _invokeProtMethod(
        $mixedObj,
        string $strMethodName,
        array $arrArguments = []
    )
    {
        $reflectionClass = new \ReflectionClass($mixedObj);

        $reflectionMethod = $reflectionClass->getMethod($strMethodName);
        $reflectionMethod->setAccessible(true);

        return $reflectionMethod->invokeArgs($mixedObj, $arrArguments);
    }

    public function _invokeProtConstructor(
        $mixedObj,
        array $arrArguments = []
    )
    {
        $reflectionClass = new \ReflectionClass($mixedObj);
        $reflectionConstructor = $reflectionClass->getConstructor();
        $reflectionConstructor->setAccessible(true);

        $objClassInstance = $reflectionClass->newInstanceWithoutConstructor();
        $reflectionConstructor->invokeArgs($objClassInstance, $arrArguments);

        return $objClassInstance;
    }

    /**
     * Uses reflection to find the return type of a given function.
     *
     * @param mixed  $mixedObj      The object of which to call this function in
     * @param string $strMethodName The function to call, example "getId"
     *
     * @return mixed What ever is the return type for that function
     * @author Daniel Walsh
     **/
    protected function _getReturnType($mixedObj, $strMethodName)
    {
        $reflectionClass = new \ReflectionClass($mixedObj);

        $reflectionMethod = $reflectionClass->getMethod($strMethodName);
        return $reflectionMethod->getReturnType();
    }

    /**
     * Over-ride in child classes to implement custom functionality
     *
     * @return void
     * @author Jon Saunders
    **/
    protected function _postSetUp()
    {
    }

    /**
     * Over-ride in child classes to implement custom functionality
     *
     * @return void
     * @author Jon Saunders
    **/
    protected function _postTearDown()
    {
    }

    /**
     * Sets a static value
     *
     * @param  mixed $mixedObj
     * @param  string $strAttribute
     * @param  mixed $mixedValue
     * @return void
     * @author Jon Saunders
    **/
    protected function _setProtAttr(
        $mixedObj,
        string $strAttribute,
        $mixedValue
    )
    {
        $reflectionClass = new \ReflectionClass($mixedObj);

        $reflectionProperty = $reflectionClass->getProperty($strAttribute);
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($mixedObj, $mixedValue);
    }

    /**
     * Whether tests should be run using process isolation
     *
     * @return bool
     * @author Jon Saunders
    **/
    public function isInIsolation()
    {
        return true;
    }

    /**
     * Inject necessary components for all tests
     *
     * @return void
     * @author Jon Saunders
    **/
    public final function setUp()
    {
        $this->_postSetUp();
    }

    /**
     * Clear ALL singletons/connections that implementing classes may have
     * accessed
     *
     * @return void
     * @author Jon Saunders
    **/
    public final function tearDown()
    {
        Mockery::close();

        $this->_postTearDown();
    }
}
