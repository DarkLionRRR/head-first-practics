<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Contracts;

interface Observer
{
    public function update(float $temperature, float $humidity, float $pressure): string;
}
