<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

interface DisplayElement
{
    public function display(): string;
}
