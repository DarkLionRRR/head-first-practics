<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HeadFirstDesignPatterns\Framework\Command\DuckAppCommand;
use HeadFirstDesignPatterns\Framework\Console\Helper\ListingHelper;
use HeadFirstDesignPatterns\Framework\Command\WeatherStationAppCommand;

final class Kernel implements KernelInterface
{
    private Application $app;

    public function __construct()
    {
        $this->app = new Application();
    }

    public static function new(): self
    {
        return new self();
    }

    public function commands(): array
    {
        return [
            DuckAppCommand::class,
            WeatherStationAppCommand::class,
        ];
    }

    public function helpers(): array
    {
        return [
            ListingHelper::class,
        ];
    }

    public function handle(InputInterface $input, OutputInterface $output): int
    {
        try {
            return $this->app
                ->registerCommands($this->commands())
                ->registerHelpers($this->helpers())
                ->run($input, $output)
            ;
        } catch (\Throwable $t) {
            throw new \RuntimeException($t->getMessage(), $t->getCode(), $t);
        }
    }
}
