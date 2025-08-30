<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Quacks;

use HeadFirstDesignPatterns\SimUDuck\Contracts\QuackBehavior;

final class Squeak implements QuackBehavior
{
    public function quack(): void
    {
        echo "squeak\n";
    }
}
