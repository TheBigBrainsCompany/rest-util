<?php

namespace Tbbc\RestUtil\Exception;

interface ExceptionMapInterface
{
    /**
     * Returns the Http status code
     *
     * @return int
     */
    function getHttpCode();

    /**
     * Returns the full qualified class name of the mapped exception
     *
     * @return string
     */
    function getMappedExceptionClassName();

    /**
     * Returns the error code that Error object should be created with
     *
     * @return int
     */
    function getErrorCode();

    /**
     * Returns the message that Error object should be created with
     *
     * @return string
     */
    function getErrorMessage();

    /**
     * Returns more info url that Error object should be created with
     *
     * @return string
     */
    function getErrorMoreInfoUrl();

    /**
     * Returns an exception handler name if this exception needs one
     *
     * @return string
     */
    function getExceptionHandlerName();
}
