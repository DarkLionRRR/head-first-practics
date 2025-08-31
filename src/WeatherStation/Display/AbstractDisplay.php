<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\WeatherStation\Display;

use HeadFirstDesignPatterns\Framework\Util\Observable;
use HeadFirstDesignPatterns\WeatherStation\Contracts\DisplayElement;

abstract class AbstractDisplay implements \SplObserver, DisplayElement
{
    protected Observable $observable;

    public function __construct(Observable $observable)
    {
        $this->observable = $observable;
        $this->observable->attach($this);
    }
}
