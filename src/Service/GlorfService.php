<?php

/**
 * Created by Josep Martí
 */

namespace Service;

use Model\Video;

/**
 * Class sharing the common methods related to the Glorf source
 */
class GlorfService extends AbstractService
{
    /**
     * Import Glorf Videos, converting them from arrays to objects.
     *
     * @param array $videosToBeImported
     *
     * @return array
     */
    public function import($videosToBeImported)
    {
        $videos = array();

        foreach ($videosToBeImported as $video) {
            $newVideo = new Video($video->title, $video->url, $video->tags);
            array_push($videos, $newVideo);
        }

        return $videos;
    }

}