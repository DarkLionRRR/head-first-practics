<?php

declare(strict_types=1);

namespace HeadFirstDesignPatterns\Framework\Console\Command;

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

#[AsCommand(
    name: 'app:duck',
    description: 'Запуск приложения из главы 1',
)]
final class DuckAppCommand extends AbstractCommand
{
    protected string $title = 'Приложение с утками из главы 1';

    protected function exec(InputInterface $input, OutputInterface $output): void
    {
        /** @var AbstractDuck[] $duckList */
        $duckList = [
            new MallardDuck(),
            new RedheadDuck(),
            new RubberDuck(),
            new DecoyDuck(),
            new ModelDuck(),
        ];

        $countDucks = count($duckList) - 1;

        ob_start();
        foreach ($duckList as $duck) {
            $duck->display();

            print_r("Duck says:\n");
            $duck->performQuack();

            print_r("Duck doing:\n");
            $duck->swim();
            $duck->performFly();

            print_r("\n=============\n\n");
        }

        print_r("Внезапно утка-приманка полетела...\n\n");
        $modelDuck = $duckList[$countDucks];
        $modelDuck->setFlyBehavior(new FlyRocketPowered());
        $modelDuck->display();
        $modelDuck->performFly();

        $content = ob_get_clean();

        if (!$content) {
            throw new \RuntimeException('No output captured from duck simulation.');
        }

        $output->writeln($content);
    }
}
