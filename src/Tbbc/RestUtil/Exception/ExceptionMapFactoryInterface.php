<?php

namespace Tbbc\RestUtil\Exception;

interface ExceptionMapFactoryInterface
{
    /**
     * @param int    $httpCode
     * @param string $mappedExceptionClassName
     * @param int    $errorCode
     * @param string $errorMessage
     * @param string $errorMoreInfoUrl
     * @param string $exceptionHandlerName
     *
     * @return ExceptionMapInterface
     */
    public function createExceptionMap($httpCode, $mappedExceptionClassName, $errorCode, $errorMessage = null,
                                       $errorMoreInfoUrl = null, $exceptionHandlerName = null);
}
