<?php

namespace DomainDrivenPhp\Temperature;

use DomainDrivenPhp\Temperature\ValueObjects\Celsius;
use DomainDrivenPhp\Temperature\ValueObjects\Fahrenheit;
use DomainDrivenPhp\Temperature\ValueObjects\Kelvin;

class TemperatureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $temperature
     * @param $scaleStr
     *
     * @dataProvider instantiateProvider
     */
    public function testInstantiate($temperature, $scaleStr)
    {
        $scale = Scale::getFromString($scaleStr);
        $temperature = new Temperature($temperature, $scale);
        $this->assertInstanceOf('\DomainDrivenPhp\Temperature\Temperature', $temperature);
    }

    /**
     * @param $temperature
     * @param $scale
     *
     * @dataProvider invalidConstructorProvider
     */
    public function testExceptionOnInvalidConstruct($temperature, $scale)
    {
        $this->expectException('Exception');
        new Temperature($temperature, $scale);
    }

    /**
     * @param Temperature $temp1
     * @param Temperature $temp2
     * @param Temperature $result
     *
     * @dataProvider addTemperaturesProvider
     */
    public function testAdd($temp1, $temp2, $result)
    {
        $this->assertEquals($result, $temp1->add($temp2));
    }

    public static function instantiateProvider()
    {
        return [
            [ 89, 'F'],
            ['89', 'f'],
            [ 89, 'fahrenheit'],
            ['32', 'C'],
            [456, 'K'],
        ];
    }

    public function invalidConstructorProvider()
    {
        return [
            [true, new Kelvin()],
            ['s', new Celsius()],
        ];
    }

    public function addTemperaturesProvider()
    {
        $f = new Fahrenheit();
        $c = new Celsius();

        return [
            [new Temperature(45, $f), new Temperature(12.5, $f), new Temperature(57.5, $f)],
            [new Temperature(-23, $c), new Temperature(40, $c), new Temperature(17, $c)],
        ];
    }
}
