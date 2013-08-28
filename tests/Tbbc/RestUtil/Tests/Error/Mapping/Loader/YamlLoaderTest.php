<?php

/**
 * This file is part of tbbc/rest-util
 *
 * (c) The Big Brains Company <contact@thebigbrainscompany.org>
 *
 */


namespace Tbbc\Error\Mapping\Loader;

use Tbbc\RestUtil\Error\Mapping\Loader\YamlLoader;

/**
 * @author Boris Guéry <guery.b@gmail.com>
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
                    ),
                    1 =>
                    array (
                        'class' => 'ResourceNotException',
                        'handler' => 'default',
                        'errorCode' => 2001,
                        'errorMessage' => 'The resource could not be found',
                    ),
                ),
            ),
            $result
        );
    }
}
