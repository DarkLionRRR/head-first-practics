<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Command;

use HeadFirstDesignPatterns\SimUDuck\DuckSet;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;
use Symfony\Component\Console\Attribute\AsCommand;
use HeadFirstDesignPatterns\SimUDuck\Ducks\DecoyDuck;
use HeadFirstDesignPatterns\SimUDuck\Ducks\ModelDuck;
use HeadFirstDesignPatterns\SimUDuck\Ducks\RubberDuck;
use HeadFirstDesignPatterns\SimUDuck\Ducks\MallardDuck;
use HeadFirstDesignPatterns\SimUDuck\Ducks\RedheadDuck;
use HeadFirstDesignPatterns\SimUDuck\Flights\FlyRocketPowered;
use HeadFirstDesignPatterns\Framework\Console\Helper\ListingHelper;

#[AsCommand(
    name: 'app:duck',
    description: 'Запуск приложения из главы 1',
)]
final class DuckAppCommand extends Command implements CommandWithTitle
{
    /** @var array<string> */
    private const array TABLE_HEADERS = ['Type', 'Info', 'Say', 'Doing'];

    public function __invoke(SymfonyStyle $io): void
    {
        /** @var ListingHelper $listingHelper */
        $listingHelper = $this->getHelper('listing');

        $duckSet = new DuckSet([
            'mallard' => MallardDuck::class,
            'redhead' => RedheadDuck::class,
            'rubber'  => RubberDuck::class,
            'decoy'   => DecoyDuck::class,
            'model'   => ModelDuck::class,
        ]);

        $io->table(
            self::TABLE_HEADERS,
            $duckSet->map(fn (AbstractDuck $duck, string $name): array => [
                $name,
                $duck->display(),
                $duck->performQuack(),
                $listingHelper->getListing([
                    $duck->swim(),
                    $duck->performFly(),
                ]),
            ]),
        );

        $io->warning('Внезапно утка-приманка полетела...');
        $modelDuck = $duckSet->get('model');
        $modelDuck->setFlyBehavior(new FlyRocketPowered());

        $io->listing([
            $modelDuck->display(),
            $modelDuck->performFly(),
        ]);
    }

    public function getTitle(): string
    {
        return 'Приложение с утками из главы 1';
    }
}
