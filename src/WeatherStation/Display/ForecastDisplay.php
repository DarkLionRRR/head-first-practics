<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

final class ForecastDisplay extends AbstractDisplay
{
    public function getName(): string
    {
        return 'forecast';
    }
}
