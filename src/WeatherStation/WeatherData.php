<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation;

use HeadFirstDesignPatterns\Framework\Util\Observable;

class WeatherData extends Observable
{
    private float $temperature;

    private float $humidity;

    private float $pressure;

    public function measurementsChanged(): void
    {
        $this->setChanged();
        $this->notify();
    }

    public function setMeasurements(float $temperature, float $humidity, float $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;

        $this->measurementsChanged();
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
