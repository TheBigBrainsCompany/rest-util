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
interface ErrorFactoryInterface
{
    /**
     * Returns an unique identifier for this error factory
     *
     * @return string
     */
    function getIdentifier();

    /**
     * Returns the Error created from the given Exception
     *
     * @param \Exception                $exception
     * @param ExceptionMappingInterface $mapping
     * @return ErrorInterface
     */
    function createError(\Exception $exception, ExceptionMappingInterface $mapping);
}
