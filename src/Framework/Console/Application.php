<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Console;

use Symfony\Component\Console\Helper\HelperInterface;
use HeadFirstDesignPatterns\Framework\Command\AbstractCommand;
use Symfony\Component\Console\Application as ConsoleApplication;

final class Application extends ConsoleApplication
{
    private const string NAME = 'Head First Design Patterns';

    private const string VERSION = '1.0.0';

    public function __construct(private readonly ?KernelInterface $kernel = null)
    {
        parent::__construct(self::NAME, self::VERSION);
    }

    /**
     * @param array<class-string<AbstractCommand>> $commands
     */
    public function registerCommands(array $commands = []): self
    {
        $commandInstances = array_map(static fn (string $command): AbstractCommand => new $command(), $commands);
        $this->addCommands($commandInstances);

        return $this;
    }

    /**
     * @param array<class-string<HelperInterface>> $helpers
     */
    public function registerHelpers(array $helpers): self
    {
        foreach ($helpers as $helper) {
            $this->getHelperSet()->set(new $helper());
        }

        return $this;
    }

    public function getKernel(): ?KernelInterface
    {
        return $this->kernel;
    }
}
