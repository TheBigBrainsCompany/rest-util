<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */


namespace Tbbc\RestUtil\Tests\Error\Mapping\Loader;

use Tbbc\RestUtil\Error\Mapping\Loader\YamlLoader;

/**
 * @author Boris Guéry <guery.b@gmail.com>
 * @author Benjamin Dulau <benjamin.dulau@gmail.com>
 */
class YamlLoaderTest extends \PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        $loader = new YamlLoader();
        $result = $loader->load(__DIR__ . '/fixtures/map.yml');

        $this->assertSame(
            array (
                'map' =>
                array (
                    0 =>
                    array (
                        'class' => 'InvalidArgumentException',
                        'handler' => 'default',
                        'errorCode' => 2000,
                        'errorMessage' => 'Invalid argument provided',
                        'errorExtendedMessage' => 'This is a more extended message for this InvalidArgumentException',
                        'errorMoreInfoUrl' => 'http://api.my.tld/error/2000',
                    ),
                    1 =>
                    array (
                        'class' => 'ResourceNotException',
                        'handler' => 'default',
                        'errorCode' => 2001,
                        'errorMessage' => 'The resource could not be found',
                        'errorExtendedMessage' => array(
                            'message1' => 'Extended message 1',
                            'message2' => 'Extended message 2'
                        ),
                        'errorMoreInfoUrl' => 'http://api.my.tld/error/2001',
                    ),
                ),
            ),
            $result
        );
    }
}
