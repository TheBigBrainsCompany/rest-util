<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tbbc\RestUtil\Error;

interface ErrorInterface
{
    function getHttpStatusCode();
    function getErrorCode();
    function getErrorMessage();
} 
