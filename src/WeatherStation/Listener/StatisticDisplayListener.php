<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Listener;

use HeadFirstDesignPatterns\WeatherStation\WeatherEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use HeadFirstDesignPatterns\WeatherStation\Display\StatisticDisplay;
use HeadFirstDesignPatterns\WeatherStation\Event\MeasurementsChangedEvent;
use HeadFirstDesignPatterns\WeatherStation\Event\DisplayConsoleOutputtedEvent;

final class StatisticDisplayListener
{
    private ?StatisticDisplay $display = null;

    public function handle(MeasurementsChangedEvent $event, string $_, EventDispatcherInterface $dispatcher): void
    {
        $weatherData = $event->getWeatherData();

        if (null === $this->display) {
            $this->display = new StatisticDisplay();
        }

        $this->display->update($weatherData->getTemperature());

        $dispatcher->dispatch(
            new DisplayConsoleOutputtedEvent($this->display->display()),
            WeatherEvents::DISPLAY_CONSOLE_OUTPUT,
        );
    }
}
