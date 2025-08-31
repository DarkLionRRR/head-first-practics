<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Contracts;

interface SubjectInterface extends \SplSubject
{
    public function detachAll(): void;

    public function setChanged(): void;

    public function clearChanged(): void;

    public function hasChanged(): bool;
}
