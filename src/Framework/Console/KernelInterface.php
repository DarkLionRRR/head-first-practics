<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Helper\HelperInterface;
use Symfony\Component\Console\Output\OutputInterface;
use HeadFirstDesignPatterns\Framework\Command\AbstractCommand;

interface KernelInterface
{
    public static function new(): self;

    /**
     * @return class-string<AbstractCommand>[]
     */
    public function commands(): array;

    /**
     * @return class-string<HelperInterface>[]
     */
    public function helpers(): array;

    public function handle(InputInterface $input, OutputInterface $output): int;
}
