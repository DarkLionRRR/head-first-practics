<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Listener;

use HeadFirstDesignPatterns\WeatherStation\WeatherEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use HeadFirstDesignPatterns\WeatherStation\Display\ForecastDisplay;
use HeadFirstDesignPatterns\WeatherStation\Event\MeasurementsChangedEvent;
use HeadFirstDesignPatterns\WeatherStation\Event\DisplayConsoleOutputtedEvent;

final class ForecastDisplayListener
{
    private ?ForecastDisplay $display = null;

    public function handle(MeasurementsChangedEvent $event, string $_, EventDispatcherInterface $dispatcher): void
    {
        $weatherData = $event->getWeatherData();

        if ($this->display === null) {
            $this->display = new ForecastDisplay();
        }

        $this->display->update($weatherData->getPressure());

        $dispatcher->dispatch(
            new DisplayConsoleOutputtedEvent($this->display->display()),
            WeatherEvents::DISPLAY_CONSOLE_OUTPUT,
        );
    }
}
