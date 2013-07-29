<?php

namespace Tbbc\RestUtil\Error;

use Tbbc\RestUtil\Exception\ExceptionMapInterface;

interface ExceptionToErrorConverterInterface
{
    /**
     * Converts the given exception into an Error object by using the given ExceptionMap
     *
     * @param \Exception            $exception
     * @param ExceptionMapInterface $exceptionMap
     * @return Error
     */
    function convert(\Exception $exception, ExceptionMapInterface $exceptionMap);
}
