<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tbbc\RestUtil\Error\Exception;

use LogicException;
use Tbbc\RestUtil\Exception;

class NotFoundExceptionMappingException extends LogicException implements Exception
{}
