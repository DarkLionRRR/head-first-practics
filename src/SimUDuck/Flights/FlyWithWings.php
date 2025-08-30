<?php

namespace HeadFirstDesignPatterns\SimUDuck\Flights;

use HeadFirstDesignPatterns\SimUDuck\Contracts\FlyBehavior;

final class FlyWithWings implements FlyBehavior
{
    public function fly(): void
    {
        echo "flying\n";
    }
}
