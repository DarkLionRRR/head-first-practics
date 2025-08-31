<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

use HeadFirstDesignPatterns\WeatherStation\Contracts\Subject;
use HeadFirstDesignPatterns\WeatherStation\Contracts\Observer;
use HeadFirstDesignPatterns\WeatherStation\Contracts\DisplayElement;

final class ForecastDisplay implements Observer, DisplayElement
{
    private float $currentPressure = 29.92;

    private float $lastPressure;

    public function __construct(Subject $weatherData)
    {
        $weatherData->registerObserver($this);
    }

    public function update(float $temperature, float $humidity, float $pressure): string
    {
        $this->lastPressure = $this->currentPressure;
        $this->currentPressure = $pressure;

        return $this->display();
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
