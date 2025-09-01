<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation;

final readonly class WeatherEvents
{
    public const string MEASUREMENTS_CHANGED = 'weather.measurements_changed';

    public const string DISPLAY_CONSOLE_OUTPUT = 'weather.display_console_output';
}
