<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

use HeadFirstDesignPatterns\WeatherStation\WeatherData;

final class CurrentConditionDisplay extends AbstractDisplay
{
    private float $temperature;

    private float $humidity;

    public function update(\SplSubject $subject): void
    {
        if (!$subject instanceof WeatherData) {
            return;
        }

        $this->temperature = $subject->getTemperature();
        $this->humidity = $subject->getHumidity();

        $this->display();
    }

    public function display(): void
    {
        printf(
            "Current conditions: %s F degrees and %s %% humidity\n",
            $this->temperature,
            $this->humidity,
        );
    }
}
