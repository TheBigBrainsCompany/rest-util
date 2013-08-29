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
class Error implements ErrorInterface
{
    protected $httpStatusCode;
    protected $errorCode;
    protected $errorMessage;
    protected $errorExtendedMessage;
    protected $errorMoreInfoUrl;

    public function __construct($httpStatusCode, $errorCode, $errorMessage, $errorExtendedMessage = null,
                                $errorMoreInfoUrl = null)
    {
        $this->httpStatusCode = $httpStatusCode;
        $this->errorCode      = $errorCode;
        $this->errorMessage   = $errorMessage;
        $this->errorExtendedMessage = $errorExtendedMessage;
        $this->errorMoreInfoUrl = $errorMoreInfoUrl;
    }

    /**
     * {@inheritDoc}
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorExtendedMessage()
    {
        return $this->errorExtendedMessage;
    }

    /**
     * {@inheritDoc}
     */
    public function getErrorMoreInfoUrl()
    {
        return $this->errorMoreInfoUrl;
    }
} 
