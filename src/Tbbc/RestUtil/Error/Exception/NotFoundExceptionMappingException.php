<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error\Exception;

use LogicException;
use Tbbc\RestUtil\Exception;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class NotFoundExceptionMappingException extends LogicException implements Exception
{}
