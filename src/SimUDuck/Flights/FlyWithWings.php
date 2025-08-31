<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Flights;

use HeadFirstDesignPatterns\SimUDuck\Contracts\FlyBehavior;

final class FlyWithWings implements FlyBehavior
{
    public function fly(): string
    {
        return 'flying';
    }
}
