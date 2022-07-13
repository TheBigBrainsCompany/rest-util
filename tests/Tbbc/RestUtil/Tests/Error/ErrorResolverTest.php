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
use Tbbc\RestUtil\Error\ErrorFactoryInterface;
use Tbbc\RestUtil\Error\ErrorResolver;
use Tbbc\RestUtil\Error\Mapping\ExceptionMap;
use Tbbc\RestUtil\Error\Mapping\ExceptionMapping;
use Tbbc\RestUtil\Error\Mapping\ExceptionMappingInterface;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class ErrorResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testResolveWithDefaultErrorFactory()
    {
        $resolver = new ErrorResolver($this->getExceptionMap());
        $resolver->registerFactory(new DefaultErrorFactory());

        $error = $resolver->resolve(new \RuntimeException('Runtime exceptionnnn!!!'));

        $this->assertEquals($error, new Error(500, 123, 'This is a runtime exception',
            'More extended message for this RuntimeException', 'http://api.my.tld/error/500123'));
    }

    public function testResolveWithCustomErrorFactory()
    {
        $resolver = new ErrorResolver($this->getExceptionMap());
        $resolver->registerFactory(new DefaultErrorFactory());
        $resolver->registerFactory(new CustomErrorFactory());

        $error = $resolver->resolve(new \InvalidArgumentException());

        $this->assertEquals($error, new Error(400, 321, 'Invalid query arguments',
            'More extended message for this InvalidArgumentException', 'http://api.my.tld/error/400321'));
    }

    private function getExceptionMap()
    {
        $map = new ExceptionMap();

        $map
            ->add(new ExceptionMapping(array(
                'exceptionClassName' => 'RuntimeException',
                'factory' => '__DEFAULT__',
                'httpStatusCode' => 500,
                'errorCode' => 123,
                'errorMessage' => 'This is a runtime exception',
                'errorExtendedMessage' => 'More extended message for this RuntimeException',
                'errorMoreInfoUrl' => 'http://api.my.tld/error/500123',
            )))
        ;

        $map->add(new ExceptionMapping(array(
                'exceptionClassName' => 'InvalidArgumentException',
                'factory' => 'custom',
                'httpStatusCode' => 400,
                'errorCode' => 321,
                'errorMessage' => 'Invalid query arguments',
                'errorExtendedMessage' => 'More extended message for this InvalidArgumentException',
                'errorMoreInfoUrl' => 'http://api.my.tld/error/400321',
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

    public function createError(\Throwable $exception, ExceptionMappingInterface $mapping)
    {
        return new Error($mapping->getHttpStatusCode(), $mapping->getErrorCode(), $mapping->getErrorMessage(),
            $mapping->getErrorExtendedMessage(), $mapping->getErrorMoreInfoUrl());
    }
}
