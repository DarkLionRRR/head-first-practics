<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Quacks;

use HeadFirstDesignPatterns\SimUDuck\Contracts\QuackBehavior;

final class Quack implements QuackBehavior
{
    public function quack(): string
    {
        return 'quack-quack';
    }
}
