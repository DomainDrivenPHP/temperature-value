<?php
/**
 * Created by PhpStorm.
 * User: bryanagee
 * Date: 8/5/16
 * Time: 2:28 AM
 */

namespace DomainDrivenPhp\Temperature;


class Kelvin extends Scale
{

    /**
     * @return string
     */
    public function getAbbreviation()
    {
        return 'K';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Kelvin';
    }

    /**
     * @param float $degrees
     *
     * @return float
     */
    public function convertToCelsius($degrees)
    {
        return $degrees - 273.15;
    }

    /**
     * @param float $degrees
     *
     * @return float
     */
    public function convertFromCelsius($degrees)
    {
        return $degrees + 273.15;
    }
}
