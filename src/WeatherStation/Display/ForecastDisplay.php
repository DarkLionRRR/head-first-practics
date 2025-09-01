<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

final class ForecastDisplay implements DisplayElement
{
    public function __construct(
        private float $currentPressure = 29.92,
        private float $lastPressure = 0.0,
    ) {}

    public function update(float $pressure): void
    {
        $this->lastPressure = $this->currentPressure;
        $this->currentPressure = $pressure;
    }

    public function display(): string
    {
        return sprintf('Forecast: %s', match (true) {
            $this->currentPressure > $this->lastPressure => 'Improving weather on the way!',
            $this->currentPressure < $this->lastPressure => 'Watch out for cooler, rainy weather',
            default                                      => 'More of the same',
        });
    }
}
