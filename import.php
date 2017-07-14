<?php
/**
 * Created by Josep Martí
 */

include_once "autoload.php";

require_once __DIR__.'/vendor/autoload.php';


use Controller\ImportController;

function printHelpCommand()
{

    echo "Usage: import [source]\n\n";
    echo "Sources:\n";
    echo "  glorf     Glorf video source uses a JSON format\n";
    echo "  flub      Flub video source uses a YAML format\n\n";
    echo "Example:\n";
    echo "  import glorf\n";

}

if (isset($argv[1])) {

    $videos = array();
    $importController = new ImportController();

    switch (strtolower($argv[1])) {
        case 'glorf':
            $videos = $importController->importGlorf();
            break;
        case 'flub':
            $videos = $importController->importFlub();
            break;
        default:
            echo "import: wrong argument\n";
            printHelpCommand();
            break;
    }

    foreach ($videos as $video) {
        echo 'importing: "' . $video->getTitle() . '"; Url: ' . $video->getUrl() . '; ';
        if(count($video->getTags())>0) echo "Tags: " .  implode(",", $video->getTags());
        echo "\n";
    }

} else {

    echo "import: missing argument\n";
    printHelpCommand();
}