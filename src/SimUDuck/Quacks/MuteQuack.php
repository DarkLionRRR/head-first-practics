<?php

namespace HeadFirstDesignPatterns\SimUDuck\Quacks;

use HeadFirstDesignPatterns\SimUDuck\Contracts\QuackBehavior;

final class MuteQuack implements QuackBehavior
{
    public function quack(): void {}
}
