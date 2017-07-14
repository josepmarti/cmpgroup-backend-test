<?php

/**
 * Created by Josep Martí.
 */

namespace tests;

include_once "autoload.php";

use Service\ServiceProvider;
use PHPUnit_Framework_TestCase as TestCase;


/**
 * @covers JSONService
 */
class JSONServiceTest extends TestCase
{

    public function jsonProvider()
    {
        // This would make more sense with more data sets instead of only 1 data set
        return [
            [
                // arrayVideo1
                array(
                    "tags" => array(
                        "microwave",
                        "cats",
                        "peanutbutter"
                    ),
                    "url" => "http://glorf.com/videos/3",
                    "title" => "science experiment goes wrong"
                ),
                // arrayVideo2
                array(
                    "tags" => array(
                        "dog",
                        "amazing"
                    ),
                    "url" => "http://glorf.com/videos/4",
                    "title" => "amazing dog can talk"
                )
            ],
        ];
    }

    /**
     * @dataProvider jsonProvider
     */
    public function testReadJsonOk($arrayVideo1, $arrayVideo2)
    {

        $path = "feed-exports/glorf.json";

        $expected = json_decode(
            json_encode(
                array(
                    $arrayVideo1,
                    $arrayVideo2
                ),
                true
            )
        );


        // Service Provider
        $serviceProvider = ServiceProvider::getInstance();

        $JSONService = $serviceProvider->getJSONService();

        // Throwing the exception
        $output = $JSONService->readJSON($path);

        $this->assertEquals(
            $output,
            $expected
        );

    }

    public function testReadJsonWithWrongPathException()
    {

        $wrongPath = "wrong/path.json";

        // Service Provider
        $serviceProvider = ServiceProvider::getInstance();

        $JSONService = $serviceProvider->getJSONService();

        // Asserting the exception message
        $this->expectExceptionMessage("JSON Service: file_get_contents(wrong/path.json): failed to open stream: No such file or directory");

        // Throwing the exception
        $JSONService->readJSON($wrongPath);

    }

    public function testReadJsonWithoutVideosParameterException()
    {

        $wrongPath = "tests/mocks/glorf-test-wrongKey.json";

        // Service Provider
        $serviceProvider = ServiceProvider::getInstance();

        $JSONService = $serviceProvider->getJSONService();

        // Asserting the exception message
        $this->expectExceptionMessage('JSON Service: Undefined property: stdClass::$videos');

        // Throwing the exception
        $JSONService->readJSON($wrongPath);

    }


}