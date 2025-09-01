<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Console;

use Throwable;
use RuntimeException;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use HeadFirstDesignPatterns\WeatherStation\WeatherEvents;
use HeadFirstDesignPatterns\Framework\Command\DuckAppCommand;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use HeadFirstDesignPatterns\Framework\Console\Helper\ListingHelper;
use HeadFirstDesignPatterns\Framework\Listener\StartCommandListener;
use HeadFirstDesignPatterns\Framework\Listener\FinishCommandListener;
use HeadFirstDesignPatterns\WeatherStation\Listener\HeatIndexListener;
use HeadFirstDesignPatterns\Framework\Command\WeatherStationAppCommand;
use HeadFirstDesignPatterns\WeatherStation\Listener\ForecastDisplayListener;
use HeadFirstDesignPatterns\WeatherStation\Listener\StatisticDisplayListener;
use HeadFirstDesignPatterns\WeatherStation\Listener\CurrentConditionDisplayListener;

final class Kernel implements KernelInterface
{
    private ?EventDispatcher $dispatcher = null;

    public function __construct(private ?Application $app = null) {}

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

    /**
     * @return array<string, array<class-string>>
     */
    public function listeners(): array
    {
        return [
            WeatherEvents::MEASUREMENTS_CHANGED => [
                CurrentConditionDisplayListener::class,
                ForecastDisplayListener::class,
                StatisticDisplayListener::class,
                HeatIndexListener::class,
            ],
            ConsoleEvents::COMMAND => [
                StartCommandListener::class,
            ],
            ConsoleEvents::TERMINATE => [
                FinishCommandListener::class,
            ],
        ];
    }

    public function handle(InputInterface $input, OutputInterface $output): int
    {
        try {
            return $this->getApplication()->run($input, $output);
        } catch (Throwable $t) {
            throw new RuntimeException($t->getMessage(), $t->getCode(), $t);
        }
    }

    public function getDispatcher(): ?EventDispatcherInterface
    {
        return $this->dispatcher;
    }

    private function getApplication(): Application
    {
        if ($this->app !== null) {
            return $this->app;
        }

        $app = new Application($this)
            ->registerCommands($this->commands())
            ->registerHelpers($this->helpers())
        ;
        $this->app = $app;

        $this->dispatcher = new EventDispatcher();
        $app->setDispatcher($this->dispatcher);
        $this->registerListeners();

        return $app;
    }

    private function registerListeners(): void
    {
        if ($this->dispatcher === null) {
            return;
        }

        foreach ($this->listeners() as $eventName => $listeners) {
            foreach ($listeners as $listener) {
                $this->dispatcher->addListener($eventName, [new $listener(), 'handle']);
            }
        }
    }
}
