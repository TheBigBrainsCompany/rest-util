<?php

namespace Tbbc\RestUtil\Tests\Error;


use Tbbc\RestUtil\Error\DefaultErrorResolver;
use Tbbc\RestUtil\Error\ExceptionToErrorConverter;
use Tbbc\RestUtil\Error\Error;
use Tbbc\RestUtil\Response\HttpCodes;

class DefaultErrorResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Tbbc\RestUtil\Error\ExceptionToErrorConverter
     */
    protected $exceptionToErrorConverter;

    /**
     * @var \Tbbc\RestUtil\Error\ErrorResolverInterface
     */
    protected $errorResolver;


    protected function setUp()
    {
        $this->exceptionToErrorConverter = new ExceptionToErrorConverter(array(
            'InvalidArgumentException' => array(
               'status'                    => HttpCodes::HTTP_BAD_REQUEST,
               'add_code'                  => '01',
               'message'                   => 'InvalidArgumentException',
               'extended_message_property' => null,
               'more_info_url'             => null,
            ),

            'RuntimeException' => array(
               'status'                    => HttpCodes::HTTP_INTERNAL_SERVER_ERROR,
               'add_code'                  => '01',
               'message'                   => 'RuntimeException',
               'extended_message_property' => null,
               'more_info_url'             => null,
            ),
        ));

        $this->errorResolver = new DefaultErrorResolver($this->exceptionToErrorConverter);
    }

    protected function tearDown()
    {
        unset($this->errorResolver);
        unset($this->exceptionToErrorConverter);
    }

    public function testResolveErrorReturnError()
    {
        $exception = new \InvalidArgumentException('Sorry dude, wrong message.', 400);
        $expectedError = new Error(400, 40001, 'InvalidArgumentException');
        $this->assertEquals($expectedError, $this->errorResolver->resolveError($exception));

        $exception = new \RuntimeException('Runtime exceptionnnnn!!!', 500);
        $expectedError = new Error(500, 50001, 'RuntimeException');
        $this->assertEquals($expectedError, $this->errorResolver->resolveError($exception));
    }
}