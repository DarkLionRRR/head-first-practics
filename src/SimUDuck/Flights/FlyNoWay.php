<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Flights;

use HeadFirstDesignPatterns\SimUDuck\Contracts\FlyBehavior;

final class FlyNoWay implements FlyBehavior
{
    public function fly(): string
    {
        return "Can't fly";
    }
}
