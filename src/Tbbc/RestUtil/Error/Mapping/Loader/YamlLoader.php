<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Tbbc\RestUtil\Error\Mapping\Loader;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser as YamlParser;
use Tbbc\RestUtil\Error\Exception\InvalidResourceException;
use Tbbc\RestUtil\Error\Exception\NotFoundResourceException;

class YamlLoader
{
    public function load($resource)
    {
        if (!stream_is_local($resource)) {
            throw new InvalidResourceException(sprintf('This is not a local file "%s".', $resource));
        }

        if (!file_exists($resource)) {
            throw new NotFoundResourceException(sprintf('File "%s" not found.', $resource));
        }

        $parser = new YamlParser();

        try {
            $map = $parser->parse(file_get_contents($resource));
        } catch (ParseException $e) {
            throw new InvalidResourceException('Error parsing YAML.', 0, $e);
        }

        return $map;
    }
} 
