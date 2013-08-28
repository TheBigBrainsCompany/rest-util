<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Error\Exception;

use InvalidArgumentException;
use Tbbc\RestUtil\Exception;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
class InvalidResourceException extends InvalidArgumentException implements Exception
{}
