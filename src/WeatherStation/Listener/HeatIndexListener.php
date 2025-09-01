<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Listener;

use HeadFirstDesignPatterns\WeatherStation\WeatherEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use HeadFirstDesignPatterns\WeatherStation\Display\HeatIndexDisplay;
use HeadFirstDesignPatterns\WeatherStation\Event\MeasurementsChangedEvent;
use HeadFirstDesignPatterns\WeatherStation\Event\DisplayConsoleOutputtedEvent;

final class HeatIndexListener
{
    private ?HeatIndexDisplay $display = null;

    public function handle(MeasurementsChangedEvent $event, string $_, EventDispatcherInterface $dispatcher): void
    {
        $weatherData = $event->getWeatherData();

        if (null === $this->display) {
            $this->display = new HeatIndexDisplay();
        }

        $this->display->update($weatherData->getTemperature(), $weatherData->getHumidity());

        $dispatcher->dispatch(
            new DisplayConsoleOutputtedEvent($this->display->display()),
            WeatherEvents::DISPLAY_CONSOLE_OUTPUT,
        );
    }
}
