<?php

namespace DomainDrivenPhp\Temperature;

class Temperature
{
    /**
     * @var Scale
     */
    private $scale;

    /**
     * @var
     */
    private $degrees;

    /**
     * Temperature constructor.
     *
     * @param float $degrees
     * @param Scale $scale
     *
     * @throws \Exception
     */
    public function __construct($degrees, Scale $scale)
    {
        $this->scale   = $scale;

        if (!is_numeric($degrees)) {
            throw new \Exception(sprintf('Invalid degrees passed into temperature: %s', $degrees));
        }
        $this->degrees = $degrees;
    }

    public function getShort()
    {
        return sprintf(
            '%s %s',
            $this->degrees,
            $this->scale->getAbbreviation()
        );
    }

    public function getLong()
    {
        return sprintf(
            '%s %s',
            $this->degrees,
            $this->scale->getName()
        );
    }

    public function getScale()
    {
        return $this->scale;
    }

    public function getDegrees()
    {
        return $this->degrees;
    }

    public function convertTo(Scale $scale)
    {
        $celsius = $this->scale->convertToCelsius($this->degrees);
        return new static($scale->convertFromCelsius($celsius), $scale);
    }

    public function add(Temperature $temperature)
    {
        if (get_class($this->scale) !== get_class($temperature->getScale())) {
            throw new \Exception('Cannot add temperatures of different scales; please convert one first.');
        }

        return new static($this->degrees + $temperature->getDegrees(), $this->scale);
    }

    public function subtract(Temperature $temperature)
    {
        if (get_class($this->scale) !== get_class($temperature->getScale())) {
            throw new \Exception('Cannot subtract temperatures of different scales; please convert one first.');
        }

        return new static($this->degrees - $temperature->getDegrees(), $this->scale);
    }
}
