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
class Error implements ErrorInterface
{
    protected $httpStatusCode;
    protected $errorCode;
    protected $errorMessage;

    public function __construct($httpStatusCode, $errorCode, $errorMessage)
    {
        $this->httpStatusCode = $httpStatusCode;
        $this->errorCode      = $errorCode;
        $this->errorMessage   = $errorMessage;
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
} 
