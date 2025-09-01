<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation;

final class WeatherData
{
    private float $temperature;

    private float $humidity;

    private float $pressure;

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function setHumidity(float $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function setPressure(float $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getHumidity(): float
    {
        return $this->humidity;
    }

    public function getPressure(): float
    {
        return $this->pressure;
    }
}
