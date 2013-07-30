<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tbbc\RestUtil\Error\Exception;

use InvalidArgumentException;
use Tbbc\RestUtil\Exception;

class InvalidResourceException extends InvalidArgumentException implements Exception
{}
