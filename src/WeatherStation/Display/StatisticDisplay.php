<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

use HeadFirstDesignPatterns\WeatherStation\Contracts\Subject;
use HeadFirstDesignPatterns\WeatherStation\Contracts\Observer;
use HeadFirstDesignPatterns\WeatherStation\Contracts\DisplayElement;

final class StatisticDisplay implements Observer, DisplayElement
{
    private float $maxTemp = 0.0;

    private float $minTemp = 200;

    private float $tempSum = 0.0;

    private int $numReadings = 0;

    public function __construct(Subject $weatherData)
    {
        $weatherData->registerObserver($this);
    }

    public function update(float $temperature, float $humidity, float $pressure): string
    {
        $this->tempSum += $temperature;
        ++$this->numReadings;

        if ($temperature > $this->maxTemp) {
            $this->maxTemp = $temperature;
        }

        if ($temperature < $this->minTemp) {
            $this->minTemp = $temperature;
        }

        return $this->display();
    }

    public function display(): string
    {
        return sprintf(
            'Avg/Max/Min temperature = %s/%s/%s',
            $this->tempSum / $this->numReadings,
            $this->maxTemp,
            $this->minTemp,
        );
    }
}
