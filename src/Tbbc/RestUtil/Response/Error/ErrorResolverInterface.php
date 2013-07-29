<?php

namespace Tbbc\RestUtil\Response\Error;

interface ErrorResolverInterface
{
    /**
     * @param \Exception $exception
     *
     * @return Error
     */
    function resolveError(\Exception $exception);
}