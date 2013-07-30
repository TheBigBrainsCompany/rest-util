<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tbbc\RestUtil\Error;

use Tbbc\RestUtil\Error\Mapping\ExceptionMapping;

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
