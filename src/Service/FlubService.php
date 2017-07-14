<?php

/**
 * Created by Josep Martí
 */

namespace Service;

use Model\Video;

/**
 * Class sharing the common methods related to the Flub source
 */
class FlubService extends AbstractService
{
    /**
     * Import Flub Videos, converting them from arrays to objects.
     *
     * @param array $videosToBeImported
     *
     * @return array
     */
    public function import($videosToBeImported)
    {
        $videos = array();

        foreach ($videosToBeImported as $video) {

            // Get values
            $labels = isset($video['labels']) ? array_map('trim', explode(',', $video['labels'])) : array();
            $name = isset($video['name']) ? $video['name'] : null;
            $url = isset($video['url']) ? $video['url'] : null;

            $newVideo = new Video($name, $url, $labels);
            array_push($videos,$newVideo);

        }

        return $videos;
    }

}