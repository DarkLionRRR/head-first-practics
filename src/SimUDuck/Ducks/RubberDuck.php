<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Ducks;

use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;
use HeadFirstDesignPatterns\SimUDuck\Quacks\Squeak;
use HeadFirstDesignPatterns\SimUDuck\Flights\FlyNoWay;

final class RubberDuck extends AbstractDuck
{
    public function __construct()
    {
        $this->quackBehavior = new Squeak();
        $this->flyBehavior = new FlyNoWay();
    }

    public function display(): string
    {
        return 'This is rubber duck.';
    }
}
