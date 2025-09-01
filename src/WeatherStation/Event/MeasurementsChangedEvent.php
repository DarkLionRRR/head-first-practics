<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Event;

use Symfony\Contracts\EventDispatcher\Event;
use HeadFirstDesignPatterns\WeatherStation\WeatherData;

final class MeasurementsChangedEvent extends Event
{
    public function __construct(private readonly WeatherData $weatherData) {}

    public function getWeatherData(): WeatherData
    {
        return $this->weatherData;
    }
}
