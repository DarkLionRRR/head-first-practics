<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HeadFirstDesignPatterns\WeatherStation\WeatherData;
use HeadFirstDesignPatterns\WeatherStation\Display\ForecastDisplay;
use HeadFirstDesignPatterns\WeatherStation\Display\HeatIndexDisplay;
use HeadFirstDesignPatterns\WeatherStation\Display\StatisticDisplay;
use HeadFirstDesignPatterns\WeatherStation\Display\CurrentConditionDisplay;

#[AsCommand(
    name: 'app:weather-station',
    description: 'Запуск приложения из главы 2',
)]
final class WeatherStationAppCommand extends AbstractCommand
{
    /** @var array<float[]> */
    private const array SAMPLE_WEATHER_DATA = [
        [80, 65, 30.4],
        [82, 70, 29.2],
        [78, 90, 29.2],
    ];

    protected string $title = 'Приложение погодной станции из главы 2';

    protected function exec(InputInterface $input, OutputInterface $output): void
    {
        $weatherData = new WeatherData();

        new CurrentConditionDisplay($weatherData);
        new StatisticDisplay($weatherData);
        new ForecastDisplay($weatherData);
        new HeatIndexDisplay($weatherData);

        foreach (self::SAMPLE_WEATHER_DATA as $dataset) {
            $this->io->info('Обновление погодных данных...');
            usleep(512_000);

            $weatherData->setMeasurements(...$dataset);

            $this->io->newLine();
        }
    }
}
