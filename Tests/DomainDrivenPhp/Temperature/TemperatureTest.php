<?php

namespace DomainDrivenPhp\Temperature;
/**
 * Created by PhpStorm.
 * User: bryanagee
 * Date: 8/5/16
 * Time: 1:42 AM
 */
class TemperatureTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $temperature
     * @param $scale
     *
     * @dataProvider instantiateProvider
     */
    public function testInstantiate($temperature, $scaleStr)
    {
        $scale = Scale::getFromString($scaleStr);
        $temperature = new Temperature($temperature, $scale);
        $this->assertInstanceof('\DomainDrivenPhp\Temperature\Temperature', $temperature);
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
}
