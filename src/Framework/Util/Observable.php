<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Util;

use HeadFirstDesignPatterns\Framework\Contracts\SubjectInterface;

abstract class Observable implements SubjectInterface, \Countable
{
    protected bool $changed = false;

    protected ObserverSet $observerSet;

    public function __construct()
    {
        $this->observerSet = new ObserverSet();
    }

    public function attach(\SplObserver $observer): void
    {
        $this->observerSet->add($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observerSet->remove($observer);
    }

    public function notify(): void
    {
        if (!$this->changed) {
            return;
        }

        $this->clearChanged();

        foreach ($this->observerSet as $observer) {
            $observer->update($this);
        }
    }

    public function detachAll(): void
    {
        $this->observerSet->removeAll();
    }

    public function setChanged(): void
    {
        $this->changed = true;
    }

    public function clearChanged(): void
    {
        $this->changed = false;
    }

    public function hasChanged(): bool
    {
        return $this->changed;
    }

    public function count(): int
    {
        return $this->observerSet->count();
    }
}
