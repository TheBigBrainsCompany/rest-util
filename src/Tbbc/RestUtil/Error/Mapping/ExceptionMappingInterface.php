<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error\Mapping;

/**
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
interface ExceptionMappingInterface
{
    /**
     * Exception full qualified class name that
     * is handled by this factory
     *
     * @return string
     */
    function getExceptionClassName();

    /**
     * Factory unique identifier
     *
     * @return string
     */
    function getErrorFactoryIdentifier();

    /**
     * Returns Http Status Code that should be mapped
     * to this Exception
     *
     * @return string
     */
    function getHttpStatusCode();

    /**
     * Returns the Error::errorCode that should be mapped
     * to this Exception
     *
     * @return string
     */
    function getErrorCode();

    /**
     * Returns a short message describing the error
     *
     * @return string
     */
    function getErrorMessage();

    /**
     * Returns a more extended message for giving detailed
     * information about the Error
     *
     * @return mixed
     */
    function getErrorExtendedMessage();

    /**
     * Returns an URL for getting more information about the
     * Error
     *
     * @return string
     */
    function getErrorMoreInfoUrl();
}
