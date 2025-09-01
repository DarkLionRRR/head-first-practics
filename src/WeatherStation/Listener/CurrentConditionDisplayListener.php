<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Listener;

use HeadFirstDesignPatterns\WeatherStation\WeatherEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use HeadFirstDesignPatterns\WeatherStation\Event\MeasurementsChangedEvent;
use HeadFirstDesignPatterns\WeatherStation\Display\CurrentConditionDisplay;
use HeadFirstDesignPatterns\WeatherStation\Event\DisplayConsoleOutputtedEvent;

final class CurrentConditionDisplayListener
{
    public function handle(MeasurementsChangedEvent $event, string $_, EventDispatcherInterface $dispatcher): void
    {
        $weatherData = $event->getWeatherData();

        $display = new CurrentConditionDisplay(
            $weatherData->getTemperature(),
            $weatherData->getHumidity(),
        );

        $dispatcher->dispatch(
            new DisplayConsoleOutputtedEvent($display->display()),
            WeatherEvents::DISPLAY_CONSOLE_OUTPUT,
        );
    }
}
