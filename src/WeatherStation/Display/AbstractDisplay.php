<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

abstract class AbstractDisplay implements DisplayInterface
{
    protected float $temperature;

    protected float $humidity;

    protected float $pressure;

    public function display(): array
    {
        return [
            'temperature' => $this->temperature.' °C',
            'humidity'    => $this->humidity.' %',
            'pressure'    => $this->pressure.' mmHg',
        ];
    }

    public function update(float $temperature, float $humidity, float $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
    }

    abstract public function getName(): string;
}
