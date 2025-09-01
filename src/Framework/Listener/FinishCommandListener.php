<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Listener;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;

final class FinishCommandListener
{
    public function handle(ConsoleTerminateEvent $event): void
    {
        $io = new SymfonyStyle($event->getInput(), $event->getOutput());

        if ($event->getExitCode() === Command::SUCCESS) {
            $io->success('Завершено успешно!');
        } else {
            $io->error('Скрипт завершен с ошибкой!');
        }
    }
}
