<?php

namespace Tbbc\RestUtil\Response\Error;

class DefaultErrorResolver implements ErrorResolverInterface
{
    private $exceptionToErrorConverter;

    public function __construct(ExceptionToErrorConverter $exceptionToErrorConverter)
    {
        $this->exceptionToErrorConverter = $exceptionToErrorConverter;
    }

    /**
     * {@inheritDoc}
     */
    public function resolveError(\Exception $exception)
    {
        return $this->exceptionToErrorConverter->convert($exception);
    }
}