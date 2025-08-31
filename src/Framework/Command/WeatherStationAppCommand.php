<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HeadFirstDesignPatterns\WeatherStation\WeatherData;

#[AsCommand(
    name: 'app:weather-station',
    description: 'Запуск приложения из главы 2',
)]
final class WeatherStationAppCommand extends AbstractCommand
{
    /** @var string[] */
    private const array TABLE_HEADERS = ['Показатель', 'Значение'];

    /** @var array<string, string> */
    private const array VALUE_NAME_DICTIONARY = [
        'temperature' => 'Температура',
        'humidity'    => 'Влажность',
        'pressure'    => 'Давление',
    ];

    protected string $title = 'Приложение погодной станции из главы 2';

    protected function exec(InputInterface $input, OutputInterface $output): void
    {
        $weatherData = new WeatherData();

        $this->io->info('Обновление погодных данных...');

        try {
            $weatherData->measurementsChanged();
            usleep(512_000);
        } catch (\Throwable $t) {
            throw new \RuntimeException($t->getMessage(), $t->getCode(), $t);
        }

        $outputData = [
            [
                'title' => 'Текущие показания:',
                'data'  => $weatherData->showCurrentConditions(),
            ],
            [
                'title' => 'Статистика:',
                'data'  => $weatherData->showStatistics(),
            ],
            [
                'title' => 'Прогноз:',
                'data'  => $weatherData->showForecast(),
            ],
        ];

        foreach ($outputData as $item) {
            $this->io->section($item['title']);
            $this->io->table(
                self::TABLE_HEADERS,
                array_map(
                    static fn (string $value, string $key): array => [
                        self::VALUE_NAME_DICTIONARY[$key] ?? $key,
                        $value,
                    ],
                    array_values($item['data']),
                    array_keys($item['data']),
                ),
            );
        }
    }
}
