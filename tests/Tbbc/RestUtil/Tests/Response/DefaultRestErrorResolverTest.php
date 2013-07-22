<?php

namespace Tbbc\RestUtil\Tests\Response;


use Tbbc\RestUtil\Response\Error\DefaultRestErrorResolver;
use Tbbc\RestUtil\Response\Error\ExceptionToRestErrorConverter;
use Tbbc\RestUtil\Response\Error\RestError;
use Tbbc\RestUtil\Response\HttpCodes;

class DefaultRestErrorResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Tbbc\RestUtil\Response\Error\ExceptionToRestErrorConverter
     */
    protected $exceptionToRestErrorConverter;

    /**
     * @var \Tbbc\RestUtil\Response\Error\RestErrorResolverInterface
     */
    protected $restErrorResolver;


    protected function setUp()
    {
        $this->exceptionToRestErrorConverter = new ExceptionToRestErrorConverter(array(
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

        $this->restErrorResolver = new DefaultRestErrorResolver($this->exceptionToRestErrorConverter);
    }

    protected function tearDown()
    {
        unset($this->restErrorResolver);
        unset($this->exceptionToRestErrorConverter);
    }

    public function testResolveErrorReturnRestError()
    {
        $exception = new \InvalidArgumentException('Sorry dude, wrong message.', 400);
        $expectedRestError = new RestError(400, 40001, 'InvalidArgumentException');
        $this->assertEquals($expectedRestError, $this->restErrorResolver->resolveError($exception));

        $exception = new \RuntimeException('Runtime exceptionnnnn!!!', 500);
        $expectedRestError = new RestError(500, 50001, 'RuntimeException');
        $this->assertEquals($expectedRestError, $this->restErrorResolver->resolveError($exception));
    }
}