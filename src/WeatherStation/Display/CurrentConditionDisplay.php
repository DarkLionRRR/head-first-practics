<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

final class CurrentConditionDisplay extends AbstractDisplay
{
    public function getName(): string
    {
        return 'current_condition';
    }
}
