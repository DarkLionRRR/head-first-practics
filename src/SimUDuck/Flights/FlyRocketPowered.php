<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Flights;

use HeadFirstDesignPatterns\SimUDuck\Contracts\FlyBehavior;

final class FlyRocketPowered implements FlyBehavior
{
    public function fly(): string
    {
        return 'rrrrrrrrocket flying';
    }
}
