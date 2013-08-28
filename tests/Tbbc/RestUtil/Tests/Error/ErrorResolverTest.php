<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */


namespace Tbbc\Error\Mapping\Loader;

use Tbbc\RestUtil\Error\Error;
use Tbbc\RestUtil\Error\ErrorFactoryInterface;
use Tbbc\RestUtil\Error\ErrorResolver;
use Tbbc\RestUtil\Error\Mapping\ExceptionMap;
use Tbbc\RestUtil\Error\Mapping\ExceptionMapping;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class ErrorResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testResolveWithDefaultErrorFactory()
    {
        $resolver = new ErrorResolver($this->getExceptionMap());

        $error = $resolver->resolve(new \RuntimeException('Runtime exceptionnnn!!!'));

        $this->assertEquals($error, new Error(500, 123, 'This is a runtime exception'));
    }

    public function testResolveWithCustomErrorFactory()
    {
        $resolver = new ErrorResolver($this->getExceptionMap());
        $resolver->registerFactory(new CustomErrorFactory());

        $error = $resolver->resolve(new \InvalidArgumentException());

        $this->assertEquals($error, new Error(400, 321, 'Invalid query arguments'));
    }

    private function getExceptionMap()
    {
        $map = new ExceptionMap();

        $map
            ->add(new ExceptionMapping(array(
                'exceptionClassName' => 'RuntimeException',
                'factory'            => '__DEFAULT__',
                'httpStatusCode'     => 500,
                'errorCode'          => 123,
                'errorMessage'       => 'This is a runtime exception',
            )))
        ;

        $map->add(new ExceptionMapping(array(
                'exceptionClassName' => 'InvalidArgumentException',
                'factory'            => 'custom',
                'httpStatusCode'     => 400,
                'errorCode'          => 321,
                'errorMessage'       => 'Invalid query arguments',
            )))
        ;

        return $map;
    }
}

class CustomErrorFactory implements ErrorFactoryInterface
{
    public function getIdentifier()
    {
        return 'custom';
    }

    public function createError(\Exception $exception, ExceptionMapping $mapping)
    {
        return new Error($mapping->getHttpStatusCode(), $mapping->getErrorCode(), $mapping->getErrorMessage());
    }
}
