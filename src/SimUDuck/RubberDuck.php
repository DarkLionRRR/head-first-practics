<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck;

class RubberDuck extends AbstractDuck
{
    public function display(): void
    {
        echo "This is rubber duck.\n";
    }
}
