<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Contracts;

interface QuackBehavior
{
    public function quack(): string;
}
