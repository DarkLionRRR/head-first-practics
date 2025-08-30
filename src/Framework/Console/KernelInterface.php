<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HeadFirstDesignPatterns\Framework\Console\Command\AbstractCommand;

interface KernelInterface
{
    public static function new(): self;

    /**
     * @return class-string<AbstractCommand>[]
     */
    public function commands(): array;

    public function handle(InputInterface $input, OutputInterface $output): int;

    public function registerCommands(): self;
}
