<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

interface DisplayInterface
{
    /**
     * @return array<string, string>
     */
    public function display(): array;

    public function update(float $temperature, float $humidity, float $pressure): void;

    public function getName(): string;
}
