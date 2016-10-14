<?php

namespace DomainDrivenPhp\Temperature;

class ScaleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @expectedException \Exception
     * @expectedExceptionMessage Temperature scale not recognized: little
     */
    public function shouldThrownExceptionWhenTryToGetScaleFromStringWithInvalidScale()
    {
        Scale::getFromString('little');
    }


    /**
     * @test
     *
     * @dataProvider validScalesProvider
     */
    public function shouldPossibleToGetScaleFromString($scaleStr)
    {
        $scale = Scale::getFromString($scaleStr);

        $this->assertInstanceOf(
            Scale::class,
            $scale
        );
    }

    public function validScalesProvider()
    {
        return [
            [
                'f',
                'fahrenheit',
                'c',
                'celsius',
                'k',
                'kelvin'
            ]
        ];
    }
}
