<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck;

use HeadFirstDesignPatterns\SimUDuck\Contracts\FlyBehavior;
use HeadFirstDesignPatterns\SimUDuck\Contracts\QuackBehavior;

abstract class AbstractDuck
{
    protected FlyBehavior $flyBehavior;

    protected QuackBehavior $quackBehavior;

    public function setFlyBehavior(FlyBehavior $behavior): void
    {
        $this->flyBehavior = $behavior;
    }

    public function setQuackBehavior(QuackBehavior $behavior): void
    {
        $this->quackBehavior = $behavior;
    }

    public function performQuack(): string
    {
        return $this->quackBehavior->quack();
    }

    public function performFly(): string
    {
        return $this->flyBehavior->fly();
    }

    public function swim(): string
    {
        return 'swimming';
    }

    abstract public function display(): string;
}
