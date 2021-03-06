<?php

/**
 * Created by Josep Martí
 */

namespace Service;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

/**
 * Class sharing the common methods related to the YAML format
 */
class YAMLService extends AbstractService
{
    /**
     * Read YAML file from $path.
     *
     * @param string $path
     *
     * @return bool
     */
    public function readYAML($path)
    {
        try {
            $yaml = Yaml::parse(file_get_contents($path));
        } catch (ParseException $e) {
            printf("YAML Service: %s", $e->getMessage());
        }

        return $yaml;
    }

}