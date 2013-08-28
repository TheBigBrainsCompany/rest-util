<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
interface ErrorInterface
{
    function getHttpStatusCode();
    function getErrorCode();
    function getErrorMessage();
} 
