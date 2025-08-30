<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Ducks;

use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;

class MallardDuck extends AbstractDuck
{
    public function display(): void
    {
        echo "This is mallard duck.\n";
    }
}
