<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Ducks;

use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;
use HeadFirstDesignPatterns\SimUDuck\Quacks\Quack;
use HeadFirstDesignPatterns\SimUDuck\Flights\FlyWithWings;

final class RedheadDuck extends AbstractDuck
{
    public function __construct()
    {
        $this->quackBehavior = new Quack();
        $this->flyBehavior = new FlyWithWings();
    }

    public function display(): void
    {
        echo "This is redhead duck.\n";
    }
}
