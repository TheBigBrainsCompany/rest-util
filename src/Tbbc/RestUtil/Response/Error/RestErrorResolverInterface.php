<?php

namespace Tbbc\RestUtil\Response\Error;

interface RestErrorResolverInterface
{
    /**
     * @param \Exception $exception
     *
     * @return RestError
     */
    function resolveError(\Exception $exception);
}