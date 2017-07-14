<?php

/**
 * Created by Josep Martí
 */

namespace Controller;

use Service\ServiceProvider;

const FLUB_PATH = "feed-exports/flub.yaml";
const GLORF_PATH = "feed-exports/glorf.json";

/**
 * Controller class for importing sources
 *
 */
class ImportController extends BaseController
{

    /**
     * Import Glorf Videos from a JSON file
     *
     * @return string $output
     */
    public function importGlorf()
    {
        // Service Provider
        $serviceProvider = ServiceProvider::getInstance();

        // JSON Service - Read JSON file
        $JSONService = $serviceProvider->getJSONService();
        $videosToBeImported = $JSONService->readJSON(GLORF_PATH);

        //Glorf Service - Parse JSON into a Video object
        $glorfService = $serviceProvider->getGlorf();
        $importedVideos = $glorfService->import($videosToBeImported);

        return $importedVideos;

    }

    /**
     * Import Flub Videos from a YAML file
     *
     * @return string $output
     */
    public function importFlub()
    {
        // Service Provider
        $serviceProvider = ServiceProvider::getInstance();

        // YAML Service - Read YAML file
        $YAMLService = $serviceProvider->getYAMLService();
        $videosToBeImported = $YAMLService->readYAML(FLUB_PATH);

        //Flub Service - Parse YAML into a Video object
        $flubService = $serviceProvider->getFlub();
        $importedVideos = $flubService->import($videosToBeImported);

        return $importedVideos;
    }
}