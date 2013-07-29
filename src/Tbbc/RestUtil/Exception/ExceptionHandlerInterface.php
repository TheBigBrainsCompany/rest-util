<?php

namespace Tbbc\RestUtil\Exception;

interface ExceptionHandlerInterface
{
    /**
     * Handles the given exception, converting it into a valid Error object
     *
     * @param \Exception $e
     * @return \Tbbc\RestUtil\Error\Error
     */
    function handle(\Exception $e);

    /**
     * Returns handler unique name identifier
     *
     * @return string
     */
    function getName();
}