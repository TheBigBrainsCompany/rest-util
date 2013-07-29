<?php

namespace Tbbc\RestUtil\Error;

interface ErrorResolverInterface
{
    /**
     * @param \Exception $exception
     *
     * @return Error
     */
    function resolveError(\Exception $exception);
}