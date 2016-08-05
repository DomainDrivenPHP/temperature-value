<?php
/**
 * Created by PhpStorm.
 * User: bryanagee
 * Date: 8/5/16
 * Time: 2:03 AM
 */

namespace DomainDrivenPhp\Temperature;


class Celsius extends Scale
{

    /**
     * @return string
     */
    public function getAbbreviation()
    {
        return 'C';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Celsius';
    }

    /**
     * @inheritdoc
     */
    public function convertToCelsius($degrees)
    {
        return $degrees;
    }

    /**
     * @inheritdoc
     */
    public function convertFromCelsius($degrees)
    {
        return $degrees;
    }
}
