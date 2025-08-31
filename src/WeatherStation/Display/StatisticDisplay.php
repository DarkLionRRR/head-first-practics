<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

final class StatisticDisplay extends AbstractDisplay
{
    public function getName(): string
    {
        return 'statistic';
    }
}
