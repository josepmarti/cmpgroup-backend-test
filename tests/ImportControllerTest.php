<?php

/**
 * Created by Josep Martí.
 */

namespace tests;

include_once "autoload.php";

use Model\Video;
use Controller\ImportController;
use PHPUnit_Framework_TestCase as TestCase;


/**
 * @covers ImportController
 */
class ImportControllerTest extends TestCase
{

    public function testImportGlorfOk()
    {
        $expectedOutput = array(
            new Video(
                "science experiment goes wrong",
                "http://glorf.com/videos/3",
                array("microwave", "cats", "peanutbutter")
            ),
            new Video(
                "amazing dog can talk",
                "http://glorf.com/videos/4",
                array("dog", "amazing")
            ),
        );

        $controller = new ImportController();

        $output = $controller->importGlorf();

        foreach ($expectedOutput as $index => $expected) {
            $this->assertEquals(
                $output[$index],
                $expected
            );
        }
    }

    public function testImportFlubOk()
    {
        $expectedOutput = array(
            new Video(
                "funny cats",
                "http://glorf.com/videos/asfds.com",
                array("cats", "cute", "funny")
            ),
            new Video(
                "more cats",
                "http://glorf.com/videos/asdfds.com",
                array("cats", "ugly", "funny")
            ),
            new Video(
                "lots of dogs",
                "http://glorf.com/videos/asasddfds.com",
                array("dogs", "cute", "funny")
            ),
            new Video(
                "bird dance",
                "http://glorf.com/videos/q34343.com",
                array()
            ),
        );

        $controller = new ImportController();

        $output = $controller->importFlub();

        foreach ($expectedOutput as $index => $expected) {
            $this->assertEquals(
                $output[$index],
                $expected
            );
        }

    }


}