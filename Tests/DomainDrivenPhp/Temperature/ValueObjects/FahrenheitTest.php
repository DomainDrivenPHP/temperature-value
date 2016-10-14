<?php

namespace DomainDrivenPhp\Temperature;

use DomainDrivenPhp\Temperature\ValueObjects\Fahrenheit;

class FahrenheitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Fahrenheit
     */
    private $fahrenheit;

    protected function setUp()
    {
        $this->fahrenheit = new Fahrenheit();
    }

    /**
     * @param $fahrenheit
     * @param $expectedCelsius
     *
     * @dataProvider toCelsiusProvider
     */
    public function testConvertToCelsius($fahrenheit, $expectedCelsius)
    {
        $this->assertEquals($expectedCelsius, $this->fahrenheit->convertToCelsius($fahrenheit));
    }

    /**
     * @param $fahrenheit
     * @param $expectedCelsius
     *
     * @dataProvider fromCelsiusProvider
     */
    public function testConvertFromCelsius($fahrenheit, $expectedCelsius)
    {
        $this->assertEquals($expectedCelsius, $this->fahrenheit->convertFromCelsius($fahrenheit));
    }

    public static function toCelsiusProvider()
    {
        return [
            [32, 0],
            [104, 40],
        ];
    }

    public static function fromCelsiusProvider()
    {
        return [
            [0, 32],
            [40, 104],
        ];
    }

    protected function tearDown()
    {
        unset($this->fahrenheit);
    }
}
