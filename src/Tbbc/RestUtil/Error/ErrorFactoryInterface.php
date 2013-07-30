<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tbbc\RestUtil\Error;

use Tbbc\RestUtil\Error\Mapping\ExceptionMapping;

interface ErrorFactoryInterface
{
    function getIdentifier();

    function createError(\Exception $exception, ExceptionMapping $mapping);
}
