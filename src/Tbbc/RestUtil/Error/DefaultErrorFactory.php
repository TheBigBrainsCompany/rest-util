<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error;

use Tbbc\RestUtil\Error\Mapping\ExceptionMapping;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class DefaultErrorFactory implements ErrorFactoryInterface
{
    public function getIdentifier()
    {
        return '__DEFAULT__';
    }

    public function createError(\Exception $exception, ExceptionMapping $mapping)
    {
        return new Error($mapping->getHttpStatusCode(), $mapping->errorCode, $mapping->errorMessage);
    }
}
