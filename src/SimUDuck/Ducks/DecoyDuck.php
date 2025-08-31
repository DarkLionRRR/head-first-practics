<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Ducks;

use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;
use HeadFirstDesignPatterns\SimUDuck\Flights\FlyNoWay;
use HeadFirstDesignPatterns\SimUDuck\Quacks\MuteQuack;

final class DecoyDuck extends AbstractDuck
{
    public function __construct()
    {
        $this->quackBehavior = new MuteQuack();
        $this->flyBehavior = new FlyNoWay();
    }

    public function display(): string
    {
        return 'This is decoy duck.';
    }
}
