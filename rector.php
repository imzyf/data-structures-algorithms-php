<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

// vendor/bin/rector --dry-run
return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/foundation',
        __DIR__.'/framework',
        __DIR__.'/gl',
        __DIR__.'/longTermInvestment',
        __DIR__.'/withholding',
        __DIR__.'/tests',
    ])
    ->withSkipPath('*/gii')
    ->withSkipPath('*/mail')
    ->withRootFiles()
    ->withPreparedSets(
        typeDeclarations: true,
        earlyReturn: true,
        strictBooleans: true,
        carbon: true,
        rectorPreset: true,
        phpunitCodeQuality: true,
        symfonyCodeQuality: true,
        symfonyConfigs: true,
        phpunit: true,
    )
    ->withPhpSets(php81: true)
    ->withRules([
        AddVoidReturnTypeWhereNoReturnRector::class,
    ]);
