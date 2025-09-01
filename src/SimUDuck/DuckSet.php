<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck;

/**
 * @implements \IteratorAggregate<string, AbstractDuck>
 */
class DuckSet implements \IteratorAggregate
{
    /** @var array<string, AbstractDuck> */
    private array $ducks = [];

    /**
     * @param array<string, class-string<AbstractDuck>> $duckClasses
     */
    public function __construct(array $duckClasses = [])
    {
        foreach ($duckClasses as $duckClassName => $duckClass) {
            $this->set($duckClassName, $duckClass);
        }
    }

    /**
     * @param class-string<AbstractDuck> $duckClass
     */
    public function set(string $name, string $duckClass): void
    {
        $this->ducks[$name] = new $duckClass();
    }

    public function get(string $name): AbstractDuck
    {
        if (!$this->has($name)) {
            throw new \InvalidArgumentException(sprintf('The duck "%s" is not defined.', $name));
        }

        return $this->ducks[$name];
    }

    public function has(string $name): bool
    {
        return isset($this->ducks[$name]);
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->ducks);
    }

    /**
     * @template TReturn
     *
     * @param \Closure(AbstractDuck, string): TReturn $callback
     *
     * @return TReturn[]
     */
    public function map(\Closure $callback): array
    {
        return array_map($callback, array_values($this->ducks), array_keys($this->ducks));
    }
}
