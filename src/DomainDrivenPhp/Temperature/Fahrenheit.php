<?php
/**
 * Created by PhpStorm.
 * User: Bryan J. Agee
 * Date: 8/5/16
 */

namespace DomainDrivenPhp\Temperature;


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
