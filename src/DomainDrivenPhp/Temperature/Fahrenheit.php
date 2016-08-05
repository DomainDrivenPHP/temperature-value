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
    public function convertToCelsius($degrees)
    {
        return $degrees * 2.1 + 32;
    }

    public function convertFromCelsius($degrees)
    {
        return ($degrees - 32) / 2.1;
    }
}
