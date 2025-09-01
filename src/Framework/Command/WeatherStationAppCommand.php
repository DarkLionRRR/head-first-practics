<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use HeadFirstDesignPatterns\WeatherStation\WeatherData;
use HeadFirstDesignPatterns\WeatherStation\WeatherEvents;
use HeadFirstDesignPatterns\Framework\Console\Application;
use HeadFirstDesignPatterns\WeatherStation\WeatherRepository;
use HeadFirstDesignPatterns\WeatherStation\Event\DisplayConsoleOutputtedEvent;

#[AsCommand(
    name: 'app:weather-station',
    description: 'Запуск приложения из главы 2',
)]
final class WeatherStationAppCommand extends Command implements CommandWithTitle
{
    /** @var array<array<float>> */
    private const array SAMPLE_WEATHER_DATA = [
        [80, 65, 30.4],
        [82, 70, 29.2],
        [78, 90, 29.2],
    ];

    public function __invoke(SymfonyStyle $io): int
    {
        /** @var Application $application */
        $application = $this->getApplication();
        $dispatcher = $application->getKernel()?->getDispatcher();
        $weatherRepository = new WeatherRepository(new WeatherData(), $dispatcher);

        $dispatcher?->addListener(
            WeatherEvents::DISPLAY_CONSOLE_OUTPUT,
            static function (DisplayConsoleOutputtedEvent $event) use ($io): void {
                $io->writeln($event->getOutput());
            }
        );

        foreach (self::SAMPLE_WEATHER_DATA as $dataset) {
            $io->info('Обновление погодных данных...');
            usleep(512_000);

            $weatherRepository->setMeasurements(...$dataset);
        }

        return Command::SUCCESS;
    }

    public function getTitle(): string
    {
        return 'Приложение погодной станции из главы 2';
    }
}
