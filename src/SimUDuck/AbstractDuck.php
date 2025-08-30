<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\SimUDuck;

abstract class AbstractDuck
{
    public function quack(): void
    {
        echo "quack-quack\n";
    }

    public function swim(): void
    {
        echo "swimming\n";
    }

    public function fly(): void
    {
        echo "flying\n";
    }

    abstract public function display(): void;
}
