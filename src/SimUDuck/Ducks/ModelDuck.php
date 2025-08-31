<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Ducks;

use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;
use HeadFirstDesignPatterns\SimUDuck\Quacks\Quack;
use HeadFirstDesignPatterns\SimUDuck\Flights\FlyNoWay;

final class ModelDuck extends AbstractDuck
{
    public function __construct()
    {
        $this->quackBehavior = new Quack();
        $this->flyBehavior = new FlyNoWay();
    }

    public function display(): string
    {
        return 'This is model duck.';
    }
}
