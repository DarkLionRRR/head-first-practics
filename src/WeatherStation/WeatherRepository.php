<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use HeadFirstDesignPatterns\WeatherStation\Event\MeasurementsChangedEvent;

final readonly class WeatherRepository
{
    public function __construct(
        private WeatherData $weatherData,
        private ?EventDispatcherInterface $eventDispatcher,
    ) {}

    public function setMeasurements(float $temperature, float $humidity, float $pressure): void
    {
        $this->weatherData
            ->setTemperature($temperature)
            ->setHumidity($humidity)
            ->setPressure($pressure)
        ;

        $event = new MeasurementsChangedEvent($this->weatherData);
        $this->eventDispatcher?->dispatch($event, WeatherEvents::MEASUREMENTS_CHANGED);
    }
}
