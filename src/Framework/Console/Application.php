<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Console;

use Symfony\Component\Console\Application as ConsoleApplication;

final class Application extends ConsoleApplication
{
    private const string NAME = 'Head First Design Patterns';

    private const string VERSION = '1.0.0';

    public function __construct()
    {
        parent::__construct(self::NAME, self::VERSION);
    }
}
