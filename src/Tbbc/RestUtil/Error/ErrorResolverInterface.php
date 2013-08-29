<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error;

/**
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
interface ErrorResolverInterface
{
    /**
     * Takes an \Exception and converts it into an ErrorInterface
     *
     * @param \Exception $exception
     * @return ErrorInterface|null Returns null if no error factory supports the given exception
     */
    function resolve(\Exception $exception);
}
