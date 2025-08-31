<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Contracts;

interface Subject
{
    public function registerObserver(Observer $observer): void;

    public function removeObserver(Observer $observer): void;

    public function notifyObservers(): \Generator;
}
