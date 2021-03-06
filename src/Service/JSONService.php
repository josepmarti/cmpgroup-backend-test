<?php

/**
 * Created by Josep Martí
 */

namespace Service;

use Exception;

/**
 * Class sharing the common methods related to the JSON format
 */
class JSONService extends AbstractService
{
    /**
     * Read JSON file from $path.
     *
     * @param string $path
     *
     * @throws Exception if the JSON file hasn't been read properly
     *
     * @return bool
     */
    public function readJSON($path)
    {
        try {

            $fileContent = file_get_contents($path);
            $json = json_decode($fileContent); // decode the JSON into an associative array

            return $json->videos;

        } catch (Exception $e) {
            throw new Exception("JSON Service: ". $e->getMessage());

        }

    }

}
