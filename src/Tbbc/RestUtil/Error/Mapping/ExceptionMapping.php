<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tbbc\RestUtil\Error\Mapping;

class ExceptionMapping
{
    private $exceptionClassName;
    private $errorFactoryIdentifier;
    private $httpStatusCode;

    public function __construct(array $mapping)
    {
        $this->exceptionClassName     = $mapping['exceptionClassName'];
        $this->errorFactoryIdentifier = $mapping['factory'];
        $this->httpStatusCode         = $mapping['httpStatusCode'];
        $this->errorCode              = $mapping['errorCode'];
        $this->errorMessage           = $mapping['errorMessage'];
    }

    public function getExceptionClassName()
    {
        return $this->exceptionClassName;
    }

    public function getErrorFactoryIdentifier()
    {
        return $this->errorFactoryIdentifier;
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
