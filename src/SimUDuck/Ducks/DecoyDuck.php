<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Ducks;

use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;

class DecoyDuck extends AbstractDuck
{
    public function display(): void
    {
        echo "This is decoy duck.\n";
    }

    #[\Override]
    public function fly(): void {}

    #[\Override]
    public function quack(): void {}
}
