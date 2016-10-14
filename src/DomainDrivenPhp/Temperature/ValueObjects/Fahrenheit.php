<?php

namespace DomainDrivenPhp\Temperature\ValueObjects;

use DomainDrivenPhp\Temperature\Scale;

class Fahrenheit extends Scale
{

    public function getAbbreviation()
    {
        return 'F';
    }

    public function getName()
    {
        return 'Fahrenheit';
    }

    /**
     * @return float
     */
    public function convertFromCelsius($degrees)
    {
        return $degrees * 1.8 + 32;
    }

    public function convertToCelsius($degrees)
    {
        return ($degrees - 32) / 1.8;
    }
}
