<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

final class StatisticDisplay implements DisplayElement
{
    public function __construct(
        private float $maxTemp = 0.0,
        private float $minTemp = 200,
        private float $tempSum = 0.0,
        private int $numReadings = 0,
    ) {}

    public function update(float $temperature): void
    {
        $this->tempSum += $temperature;
        ++$this->numReadings;

        if ($temperature > $this->maxTemp) {
            $this->maxTemp = $temperature;
        }

        if ($temperature < $this->minTemp) {
            $this->minTemp = $temperature;
        }
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
