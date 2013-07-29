<?php

namespace Tbbc\RestUtil\Error;

use Tbbc\RestUtil\Exception\ExceptionHandlerInterface;
use Tbbc\RestUtil\Exception\ExceptionMapInterface;

class DefaultErrorResolver implements ErrorResolverInterface
{
    protected $handlers;
    protected $exceptionMappings;
    protected $exceptionToErrorConverter;

    /**
     * @param ExceptionToErrorConverterInterface $exceptionToErrorConverter
     * @param ExceptionMapInterface[]|array      $exceptionMappings
     */
    public function __construct(ExceptionToErrorConverterInterface $exceptionToErrorConverter, array $exceptionMappings)
    {
        $this->handlers = array();
        $this->exceptionToErrorConverter = $exceptionToErrorConverter;
        $this->exceptionMappings = $exceptionMappings;
    }

    /**
     * {@inheritDoc}
     */
    public function resolveError(\Exception $exception)
    {
        $map = null;
        foreach($this->exceptionMappings as $mapping) {
            if ($this->getFqcn($exception) === $mapping->getMappedExceptionClassName()) {
                $map = $mapping;

                break;
            }
        }

        if (null === $map) {
            return null;
        }

        $error = $this->exceptionToErrorConverter->convert($exception, $map);

        if (isset($this->handlers[$map->getExceptionHandlerName()])) {
            // TODO
        }

        return $error;
    }

    /**
     * Registers a new exception handler
     *
     * @param ExceptionHandlerInterface $handler
     */
    public function registerHandler(ExceptionHandlerInterface $handler)
    {
        $this->handlers[$handler->getName()] = $handler;
    }

    /**
     * @param mixed $object
     * @return string
     */
    private function getFqcn($object)
    {
        return get_class($object);
    }
}
