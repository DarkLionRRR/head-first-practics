<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HeadFirstDesignPatterns\WeatherStation\WeatherData;
use HeadFirstDesignPatterns\WeatherStation\WeatherEvents;
use HeadFirstDesignPatterns\Framework\Console\Application;
use HeadFirstDesignPatterns\WeatherStation\WeatherRepository;
use HeadFirstDesignPatterns\WeatherStation\Event\DisplayConsoleOutputtedEvent;

#[AsCommand(
    name: 'app:weather-station',
    description: 'Запуск приложения из главы 2',
)]
final class WeatherStationAppCommand extends AbstractCommand
{
    /** @var array<array<float>> */
    private const array SAMPLE_WEATHER_DATA = [
        [80, 65, 30.4],
        [82, 70, 29.2],
        [78, 90, 29.2],
    ];

    protected string $title = 'Приложение погодной станции из главы 2';

    protected function exec(InputInterface $input, OutputInterface $output): void
    {
        /** @var Application $application */
        $application = $this->getApplication();
        $dispatcher = $application->getKernel()?->getDispatcher();
        $weatherRepository = new WeatherRepository(new WeatherData(), $dispatcher);

        $dispatcher?->addListener(
            WeatherEvents::DISPLAY_CONSOLE_OUTPUT,
            function (DisplayConsoleOutputtedEvent $event): void {
                $this->io->writeln($event->getOutput());
            }
        );

        foreach (self::SAMPLE_WEATHER_DATA as $dataset) {
            $this->io->info('Обновление погодных данных...');
            usleep(512_000);

            $weatherRepository->setMeasurements(...$dataset);
        }
    }
}
