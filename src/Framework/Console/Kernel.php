<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HeadFirstDesignPatterns\Framework\Console\Command\DuckAppCommand;
use HeadFirstDesignPatterns\Framework\Console\Command\AbstractCommand;

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
        ];
    }

    public function handle(InputInterface $input, OutputInterface $output): int
    {
        try {
            return $this->app->run($input, $output);
        } catch (\Throwable $t) {
            throw new \RuntimeException($t->getMessage(), $t->getCode(), $t);
        }
    }

    public function registerCommands(): self
    {
        $commands = array_map(static fn (string $command): AbstractCommand => new $command(), $this->commands());
        $this->app->addCommands($commands);

        return $this;
    }
}
