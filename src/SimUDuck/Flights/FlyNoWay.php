<?php

namespace HeadFirstDesignPatterns\SimUDuck\Flights;

use HeadFirstDesignPatterns\SimUDuck\Contracts\FlyBehavior;

final class FlyNoWay implements FlyBehavior
{
    public function fly(): void {}
}
