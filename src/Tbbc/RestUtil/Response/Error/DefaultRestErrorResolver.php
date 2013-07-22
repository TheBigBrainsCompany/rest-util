<?php

namespace Tbbc\RestUtil\Response\Error;

class DefaultRestErrorResolver implements RestErrorResolverInterface
{
    private $exceptionToRestErrorConverter;

    public function __construct(ExceptionToRestErrorConverter $exceptionToRestErrorConverter)
    {
        $this->exceptionToRestErrorConverter = $exceptionToRestErrorConverter;
    }

    /**
     * {@inheritDoc}
     */
    public function resolveError(\Exception $exception)
    {
        return $this->exceptionToRestErrorConverter->convert($exception);
    }
}