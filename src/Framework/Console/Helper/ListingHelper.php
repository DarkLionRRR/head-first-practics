<?php

namespace HeadFirstDesignPatterns\Framework\Console\Helper;

use Symfony\Component\Console\Helper\Helper;

final class ListingHelper extends Helper
{
    /**
     * @param string[] $elements
     */
    public function getListing(array $elements): string
    {
        $list = array_map(static fn (string $element): string => sprintf(" * %s\n", $element), $elements);

        return implode('', $list);
    }

    public function getName(): string
    {
        return 'listing';
    }
}
