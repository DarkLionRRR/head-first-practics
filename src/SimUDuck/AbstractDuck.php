<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck;

use HeadFirstDesignPatterns\SimUDuck\Contracts\FlyBehavior;
use HeadFirstDesignPatterns\SimUDuck\Contracts\QuackBehavior;

abstract class AbstractDuck
{
    protected FlyBehavior $flyBehavior;

    protected QuackBehavior $quackBehavior;

    public function performQuack(): void
    {
        $this->quackBehavior->quack();
    }

    public function performFly(): void
    {
        $this->flyBehavior->fly();
    }

    public function swim(): void
    {
        echo "swimming\n";
    }

    public function setFlyBehavior(FlyBehavior $behavior): void
    {
        $this->flyBehavior = $behavior;
    }

    abstract public function display(): void;
}
