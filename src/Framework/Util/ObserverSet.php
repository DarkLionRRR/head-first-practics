<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Util;

/**
 * @implements \IteratorAggregate<array-key, \SplObserver>
 */
class ObserverSet implements \IteratorAggregate, \Countable
{
    /** @var \SplObserver[] */
    private array $observers;

    public function __construct(\SplObserver ...$observers)
    {
        $this->observers = $observers;
    }

    public function add(\SplObserver $observer): void
    {
        if (!$this->has($observer)) {
            $this->observers[] = $observer;
        }
    }

    public function remove(\SplObserver $observer): void
    {
        $index = array_search($observer, $this->observers, true);

        if (false === $index) {
            return;
        }

        unset($this->observers[$index]);

        $this->observers = array_values($this->observers);
    }

    public function removeAll(): void
    {
        $this->observers = [];
    }

    public function has(\SplObserver $observer): bool
    {
        return in_array($observer, $this->observers, true);
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->observers);
    }

    public function count(): int
    {
        return count($this->observers);
    }
}
