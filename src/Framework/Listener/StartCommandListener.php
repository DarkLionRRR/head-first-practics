<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Listener;

use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use HeadFirstDesignPatterns\Framework\Command\CommandWithTitle;

final class StartCommandListener
{
    public function handle(ConsoleCommandEvent $event): void
    {
        $io = new SymfonyStyle($event->getInput(), $event->getOutput());
        $command = $event->getCommand();

        if ($command instanceof CommandWithTitle) {
            $io->title(sprintf('Запуск "%s".', $command->getTitle()));
        }
    }
}
