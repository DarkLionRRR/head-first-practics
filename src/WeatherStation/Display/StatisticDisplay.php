<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

use HeadFirstDesignPatterns\WeatherStation\WeatherData;

final class StatisticDisplay extends AbstractDisplay
{
    private float $maxTemp = 0.0;

    private float $minTemp = 200;

    private float $tempSum = 0.0;

    private int $numReadings = 0;

    public function update(\SplSubject $subject): void
    {
        if (!$subject instanceof WeatherData) {
            return;
        }

        $temperature = $subject->getTemperature();

        $this->tempSum += $temperature;
        ++$this->numReadings;

        if ($temperature > $this->maxTemp) {
            $this->maxTemp = $temperature;
        }

        if ($temperature < $this->minTemp) {
            $this->minTemp = $temperature;
        }

        $this->display();
    }

    public function display(): void
    {
        printf(
            "Avg/Max/Min temperature = %s/%s/%s\n",
            $this->tempSum / $this->numReadings,
            $this->maxTemp,
            $this->minTemp,
        );
    }
}
