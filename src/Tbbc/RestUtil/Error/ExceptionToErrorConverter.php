<?php

namespace Tbbc\RestUtil\Error;

use Tbbc\RestUtil\Exception\ExceptionMapInterface;

class ExceptionToErrorConverter implements ExceptionToErrorConverterInterface
{
    /**
     * {@inheritDoc}
     */
    public function convert(\Exception $exception, ExceptionMapInterface $exceptionMap)
    {
        $status = $exceptionMap->getHttpCode();
        $code = $exceptionMap->getErrorCode();
        $message = $exceptionMap->getErrorMessage();
        $moreInfoUrl = $exceptionMap->getErrorMoreInfoUrl();

        $error = new Error($status, $code, $message, $moreInfoUrl);

        return $error;
    }
}
