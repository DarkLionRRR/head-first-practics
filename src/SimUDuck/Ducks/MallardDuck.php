<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Ducks;

use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;
use HeadFirstDesignPatterns\SimUDuck\Quacks\Quack;
use HeadFirstDesignPatterns\SimUDuck\Flights\FlyWithWings;

final class MallardDuck extends AbstractDuck
{
    public function __construct()
    {
        $this->quackBehavior = new Quack();
        $this->flyBehavior = new FlyWithWings();
    }

    public function display(): string
    {
        return 'This is mallard duck.';
    }
}
