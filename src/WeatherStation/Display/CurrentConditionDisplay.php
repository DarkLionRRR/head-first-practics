<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

final readonly class CurrentConditionDisplay implements DisplayElement
{
    public function __construct(
        private float $temperature = 0.0,
        private float $humidity = 0.0,
    ) {}

    public function display(): string
    {
        return sprintf(
            'Current conditions: %s F degrees and %s %% humidity',
            $this->temperature,
            $this->humidity,
        );
    }
}
