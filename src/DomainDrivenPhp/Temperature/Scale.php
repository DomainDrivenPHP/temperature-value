<?php

namespace DomainDrivenPhp\Temperature;

use DomainDrivenPhp\Temperature\ValueObjects\Celsius;
use DomainDrivenPhp\Temperature\ValueObjects\Fahrenheit;
use DomainDrivenPhp\Temperature\ValueObjects\Kelvin;

/**
 * Interface Scale
 * @package DomainDrivenPhp\Temperature
 */
abstract class Scale
{
    /**
     * @return string
     */
    public abstract function getAbbreviation();

    /**
     * @return string
     */
    public abstract function getName();

    /**
     * @param float $degrees
     * @return float
     */
    public abstract function convertToCelsius($degrees);

    /**
     * @param float $degrees
     * @return float
     */
    public abstract function convertFromCelsius($degrees);

    public static function getFromString($scale)
    {
        switch (strtolower($scale)) {
            case 'f':
            case 'fahrenheit':
                return new Fahrenheit();

            case 'c':
            case 'celsius':
                return new Celsius();

            case 'k':
            case 'kelvin':
                return new Kelvin();
        }

        throw new \Exception(sprintf('Temperature scale not recognized: %s', $scale));
    }
}
