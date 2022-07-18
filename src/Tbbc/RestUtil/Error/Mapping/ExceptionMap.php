<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error\Mapping;

use Tbbc\RestUtil\Error\Exception\NotFoundExceptionMappingException;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class ExceptionMap implements \Iterator
{
    /**
     * @var ExceptionMapping[]
     */
    private $map;

    public function add(ExceptionMapping $mapping)
    {
        $this->map[$mapping->getExceptionClassName()] = $mapping;
    }

    public function merge(ExceptionMap $map)
    {
        foreach ($map as $mapping) {
            $this->add($mapping);
        }
    }

    public function getMapping(\Throwable $exception)
    {
        foreach ($this->map as $mapping) {
            if (get_class($exception) === $mapping->getExceptionClassName()) {

                return $mapping;
            }
        }

        throw new NotFoundExceptionMappingException();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return current($this->map);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->map);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->map);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     *       Returns true on success or false on failure.
     */
    public function valid()
    {
        return (bool) key($this->map);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        rewind($this->map);
    }
} 
