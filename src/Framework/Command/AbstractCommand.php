<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Command;

use Throwable;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractCommand extends Command
{
    protected string $title;

    protected SymfonyStyle $io;

    public function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io->title(sprintf('Запуск "%s".', $this->title));

        try {
            $this->exec($input, $output);
        } catch (Throwable $t) {
            throw new RuntimeException($t->getMessage(), $t->getCode(), $t);
        }

        $this->io->success('Завершено успешно.');

        return Command::SUCCESS;
    }

    abstract protected function exec(InputInterface $input, OutputInterface $output): void;
}
