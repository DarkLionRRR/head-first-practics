<?php

namespace HeadFirstDesignPatterns\SimUDuck\Flights;

use HeadFirstDesignPatterns\SimUDuck\Contracts\FlyBehavior;

final class FlyRocketPowered implements FlyBehavior
{
    public function fly(): void
    {
        echo "rrrrrrrrocket flying\n";
    }
}
