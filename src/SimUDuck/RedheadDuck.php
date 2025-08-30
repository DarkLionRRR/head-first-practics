<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck;

class RedheadDuck extends AbstractDuck
{
    public function display(): void
    {
        echo "This is redhead duck.\n";
    }
}
