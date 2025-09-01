<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Command;

interface CommandWithTitle
{
    public function getTitle(): string;
}
