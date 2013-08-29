<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Tests\Error;

use Tbbc\RestUtil\Error\DefaultErrorFactory;
use Tbbc\RestUtil\Error\Error;
use Tbbc\RestUtil\Error\ErrorResolver;
use Tbbc\RestUtil\Error\Mapping\ExceptionMap;
use Tbbc\RestUtil\Error\Mapping\ExceptionMapping;
use Tbbc\RestUtil\Error\Mapping\ExceptionMappingInterface;

/**
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class DefaultErrorFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultErrorFactoryCreateErrorSetExceptionMessageIfNoMessageIsGiven()
    {
        // setup
        $exceptionMapping = new ExceptionMapping(array(
            'exceptionClassName' => '\InvalidArgumentException',
            'factory' => 'default',
            'httpStatusCode' => 400,
            'errorCode' => 400101,
            'errorMessage' => null,
            'errorExtendedMessage' => 'Extended message',
            'errorMoreInfoUrl' => 'http://api.my.tld/doc/error/400101',
        ));

        // test
        $defaultErrorFactory = new DefaultErrorFactory();
        $exception = new \InvalidArgumentException('This is an invalid argument exception.');

        $expectedError = new Error(
            400,
            400101,
            'This is an invalid argument exception.',
            'Extended message',
            'http://api.my.tld/doc/error/400101'
        );
        $actualError = $defaultErrorFactory->createError($exception, $exceptionMapping);

        $this->assertEquals($expectedError, $actualError);
    }

    public function testDefaultErrorFactoryCreateErrorIgnoreExceptionMessageIfAMessageIsGiven()
    {
        // setup
        $exceptionMapping = new ExceptionMapping(array(
            'exceptionClassName' => '\InvalidArgumentException',
            'factory' => 'default',
            'httpStatusCode' => 400,
            'errorCode' => 400101,
            'errorMessage' => 'Custom error message',
            'errorExtendedMessage' => 'Extended message',
            'errorMoreInfoUrl' => 'http://api.my.tld/doc/error/400101',
        ));

        // test
        $defaultErrorFactory = new DefaultErrorFactory();
        $exception = new \InvalidArgumentException('This is an invalid argument exception.');

        $expectedError = new Error(
            400,
            400101,
            'Custom error message',
            'Extended message',
            'http://api.my.tld/doc/error/400101'
        );
        $actualError = $defaultErrorFactory->createError($exception, $exceptionMapping);

        $this->assertEquals($expectedError, $actualError);
    }
}
