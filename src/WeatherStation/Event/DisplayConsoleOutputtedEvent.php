<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Event;

use Symfony\Contracts\EventDispatcher\Event;

final class DisplayConsoleOutputtedEvent extends Event
{
    public function __construct(private readonly string $output) {}

    public function getOutput(): string
    {
        return $this->output;
    }
}
