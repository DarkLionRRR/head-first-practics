<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation;

use HeadFirstDesignPatterns\WeatherStation\Contracts\Subject;
use HeadFirstDesignPatterns\WeatherStation\Contracts\Observer;

class WeatherData implements Subject
{
    private ObserverSet $observerSet;

    private float $temperature;

    private float $humidity;

    private float $pressure;

    public function __construct()
    {
        $this->observerSet = new ObserverSet();
    }

    public function registerObserver(Observer $observer): void
    {
        $this->observerSet->add($observer);
    }

    public function removeObserver(Observer $observer): void
    {
        $this->observerSet->remove($observer);
    }

    /**
     * @return \Generator<string>
     */
    public function notifyObservers(): \Generator
    {
        foreach ($this->observerSet as $observer) {
            yield $observer->update($this->temperature, $this->humidity, $this->pressure);
        }
    }

    /**
     * @return \Generator<string>
     */
    public function measurementsChanged(): \Generator
    {
        yield from $this->notifyObservers();
    }

    /**
     * @return \Generator<string>
     */
    public function setMeasurements(float $temperature, float $humidity, float $pressure): \Generator
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;

        yield from $this->measurementsChanged();
    }
}
