<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Command;

use HeadFirstDesignPatterns\SimUDuck\DuckSet;
use HeadFirstDesignPatterns\SimUDuck\AbstractDuck;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use HeadFirstDesignPatterns\SimUDuck\Ducks\DecoyDuck;
use HeadFirstDesignPatterns\SimUDuck\Ducks\ModelDuck;
use Symfony\Component\Console\Output\OutputInterface;
use HeadFirstDesignPatterns\SimUDuck\Ducks\RubberDuck;
use HeadFirstDesignPatterns\SimUDuck\Ducks\MallardDuck;
use HeadFirstDesignPatterns\SimUDuck\Ducks\RedheadDuck;
use HeadFirstDesignPatterns\SimUDuck\Flights\FlyRocketPowered;
use HeadFirstDesignPatterns\Framework\Console\Helper\ListingHelper;

#[AsCommand(
    name: 'app:duck',
    description: 'Запуск приложения из главы 1',
)]
final class DuckAppCommand extends AbstractCommand
{
    /** @var array<string> */
    private const array TABLE_HEADERS = ['Type', 'Info', 'Say', 'Doing'];
    protected string $title = 'Приложение с утками из главы 1';

    protected function exec(InputInterface $input, OutputInterface $output): void
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

        $this->io->table(
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

        $this->io->warning('Внезапно утка-приманка полетела...');
        $modelDuck = $duckSet->get('model');
        $modelDuck->setFlyBehavior(new FlyRocketPowered());

        $this->io->listing([
            $modelDuck->display(),
            $modelDuck->performFly(),
        ]);
    }
}
