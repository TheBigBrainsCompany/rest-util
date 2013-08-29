<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */

namespace Tbbc\RestUtil\Tests\Error;

use Tbbc\RestUtil\Error\Error;

/**
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class ErrorTest extends \PHPUnit_Framework_TestCase
{
    public function testExtendedMessageAndMoreInfoUrlAreOptional()
    {
        $error = new Error(400, 400110, 'Error message');
    }

    public function testToArrayReturnsWellFormedArray()
    {
        $error = new Error(400, 400110, 'Error message', 'Extended message', 'http://api.my.tld/error/400110');

        $expectedArray = array(
            'http_status_code' => 400,
            'code' => 400110,
            'message' => 'Error message',
            'extended_message' => 'Extended message',
            'more_info_url' => 'http://api.my.tld/error/400110',
        );

        $this->assertSame($expectedArray, $error->toArray());
    }
}
