<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation;

use Random\RandomException;
use HeadFirstDesignPatterns\WeatherStation\Display\ForecastDisplay;
use HeadFirstDesignPatterns\WeatherStation\Display\StatisticDisplay;
use HeadFirstDesignPatterns\WeatherStation\Display\CurrentConditionDisplay;

class WeatherData
{
    private CurrentConditionDisplay $currentConditionDisplay;

    private StatisticDisplay $statisticDisplay;

    private ForecastDisplay $forecastDisplay;

    public function __construct()
    {
        $this->currentConditionDisplay = new CurrentConditionDisplay();
        $this->statisticDisplay = new StatisticDisplay();
        $this->forecastDisplay = new ForecastDisplay();
    }

    /**
     * @throws RandomException
     */
    public function measurementsChanged(): void
    {
        $temp = $this->getTemperature();
        $humidity = $this->getHumidity();
        $pressure = $this->getPressure();

        $this->currentConditionDisplay->update($temp, $humidity, $pressure);
        $this->statisticDisplay->update($temp, $humidity, $pressure);
        $this->forecastDisplay->update($temp, $humidity, $pressure);
    }

    /**
     * @return array<string, string>
     */
    public function showCurrentConditions(): array
    {
        return $this->currentConditionDisplay->display();
    }

    /**
     * @return array<string, string>
     */
    public function showStatistics(): array
    {
        return $this->statisticDisplay->display();
    }

    /**
     * @return array<string, string>
     */
    public function showForecast(): array
    {
        return $this->forecastDisplay->display();
    }

    /**
     * @throws RandomException
     */
    private function getTemperature(): float
    {
        return (float) random_int(-20, 40);
    }

    /**
     * @throws RandomException
     */
    private function getHumidity(): float
    {
        return (float) random_int(40, 80);
    }

    /**
     * @throws RandomException
     */
    private function getPressure(): float
    {
        return (float) random_int(720, 780);
    }
}
