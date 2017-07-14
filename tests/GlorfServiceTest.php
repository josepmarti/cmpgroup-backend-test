<?php

/**
 * Created by Josep Martí.
 */

namespace tests;

include_once "autoload.php";

use Model\Video;
use Service\ServiceProvider;
use PHPUnit_Framework_TestCase as TestCase;


/**
 * @covers GlorfService
 */
class GlorfServiceTest extends TestCase
{

    public function testImportEmptyArrayOk()
    {
        $emptyArray = array();

        // Service Provider
        $serviceProvider = ServiceProvider::getInstance();

        //Glorf Service - Parse JSON into a Video object
        $glorfService = $serviceProvider->getGlorf();

        $output = $glorfService->import($emptyArray);

        $this->assertEmpty(
            $output
        );

    }

    public function testImportLabelsFormatArrayOk()
    {
        $rightFormat = json_decode(
            json_encode(
                array("videos" => array("title" => "funny cats", "url" => "http://glorf.com/videos/asfds.com", "tags" => array("cats", "cute", "funny"))),
                true
            )
        );

        $expectedOutput = array(
            new Video(
                "funny cats",
                "http://glorf.com/videos/asfds.com",
                array("cats", "cute", "funny")
            )
        );

        // Service Provider
        $serviceProvider = ServiceProvider::getInstance();

        //Glorf Service - Parse JSON into a Video object
        $glorfService = $serviceProvider->getGlorf();

        $output = $glorfService->import($rightFormat);

        $this->assertEquals(
            $output,
            $expectedOutput
        );

    }

}