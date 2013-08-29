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
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
interface ErrorInterface
{
    /**
     * Returns the corresponding HTTP Status Code
     * for this Error
     *
     * @return string
     */
    function getHttpStatusCode();

    /**
     * Returns the error code that should be appended
     * to the Http Status Code
     *
     * @return string
     */
    function getErrorCode();

    /**
     * Returns a short message describing the Error
     *
     * @return string
     */
    function getErrorMessage();

    /**
     * Returns an extended message for giving detailed
     * information about the Error
     *
     * @return mixed
     */
    function getErrorExtendedMessage();

    /**
     * Returns an URL to get more information about the
     * Error
     *
     * @return string
     */
    function getErrorMoreInfoUrl();
} 
