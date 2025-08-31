<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

use HeadFirstDesignPatterns\WeatherStation\WeatherData;

final class ForecastDisplay extends AbstractDisplay
{
    private float $currentPressure = 29.92;

    private float $lastPressure;

    public function update(\SplSubject $subject): void
    {
        if (!$subject instanceof WeatherData) {
            return;
        }

        $this->lastPressure = $this->currentPressure;
        $this->currentPressure = $subject->getPressure();

        $this->display();
    }

    public function display(): void
    {
        printf("Forecast: %s\n", match (true) {
            $this->currentPressure > $this->lastPressure => 'Improving weather on the way!',
            $this->currentPressure < $this->lastPressure => 'Watch out for cooler, rainy weather',
            default                                      => 'More of the same',
        });
    }
}
