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
interface ErrorFactoryInterface
{
    function getIdentifier();

    function createError(\Exception $exception, ExceptionMapping $mapping);
}
