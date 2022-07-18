<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error;

use Tbbc\RestUtil\Error\Mapping\ExceptionMappingInterface;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class DefaultErrorFactory implements ErrorFactoryInterface
{
    public function getIdentifier()
    {
        return '__DEFAULT__';
    }

    public function createError(\Throwable $exception, ExceptionMappingInterface $mapping)
    {
        $errorMessage = $mapping->getErrorMessage();
        if (empty($errorMessage)) {
            $errorMessage = $exception->getMessage();
        }

        return new Error($mapping->getHttpStatusCode(), $mapping->getErrorCode(), $errorMessage,
            $mapping->getErrorExtendedMessage(), $mapping->getErrorMoreInfoUrl());
    }
}
