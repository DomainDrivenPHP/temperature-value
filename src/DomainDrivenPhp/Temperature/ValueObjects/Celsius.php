<?php

namespace DomainDrivenPhp\Temperature\ValueObjects;

use DomainDrivenPhp\Temperature\Scale;

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
