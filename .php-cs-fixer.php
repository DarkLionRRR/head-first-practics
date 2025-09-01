<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = Finder::create()
    ->in(__DIR__)
    ->append([
        '.php-cs-fixer.php',
        'hfb',
    ])
;

return new Config()
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__.'/vendor/var/cache/.php-cs-fixer.cache')
    ->setRules([
        '@PhpCsFixer'     => true,
        '@PHP84Migration' => true,
        'void_return'     => true,

        'ordered_imports' => [
            'imports_order'  => ['class', 'function', 'const'],
            'sort_algorithm' => 'length',
        ],

        'binary_operator_spaces' => [
            'operators' => [
                '=>' => 'align',
            ],
        ],

        'yoda_style' => [
            'equal'            => false,
            'identical'        => false,
            'less_and_greater' => false,
        ],

        'global_namespace_import' => ['import_classes' => true],
        'declare_strict_types'    => true,
        'phpdoc_array_type'       => true,
    ])
;
