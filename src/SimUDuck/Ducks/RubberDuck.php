<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck\Ducks;

use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;

class RubberDuck extends AbstractDuck
{
    public function display(): void
    {
        echo "This is rubber duck.\n";
    }

    #[\Override]
    public function fly(): void {}
}
