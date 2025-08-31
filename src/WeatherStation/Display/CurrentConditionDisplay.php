<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

use HeadFirstDesignPatterns\WeatherStation\Contracts\Subject;
use HeadFirstDesignPatterns\WeatherStation\Contracts\Observer;
use HeadFirstDesignPatterns\WeatherStation\Contracts\DisplayElement;

final class CurrentConditionDisplay implements Observer, DisplayElement
{
    private float $temperature;

    private float $humidity;

    public function __construct(Subject $weatherData)
    {
        $weatherData->registerObserver($this);
    }

    public function update(float $temperature, float $humidity, float $pressure): string
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;

        return $this->display();
    }

    public function display(): string
    {
        return sprintf(
            'Current conditions: %s F degrees and %s %% humidity',
            $this->temperature,
            $this->humidity,
        );
    }
}
