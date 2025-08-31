<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation;

use HeadFirstDesignPatterns\WeatherStation\Contracts\Observer;

/**
 * @implements \IteratorAggregate<array-key, Observer>
 */
class ObserverSet implements \IteratorAggregate
{
    /** @var Observer[] */
    private array $observers;

    public function __construct(Observer ...$observers)
    {
        $this->observers = $observers;
    }

    public function add(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function remove(Observer $observer): void
    {
        $index = array_search($observer, $this->observers, true);

        if (false === $index) {
            return;
        }

        unset($this->observers[$index]);

        $this->observers = array_values($this->observers);
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->observers);
    }
}
