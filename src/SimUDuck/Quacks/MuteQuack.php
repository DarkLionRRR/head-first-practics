<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Quacks;

use HeadFirstDesignPatterns\SimUDuck\Contracts\QuackBehavior;

final class MuteQuack implements QuackBehavior
{
    public function quack(): void
    {
        echo "I can't quack\n";
    }
}
