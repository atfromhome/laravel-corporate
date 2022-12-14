<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use PhpCsFixer\Fixer\ClassNotation\FinalClassFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMethodCasingFixer;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $config): void {
    $config->paths([
        __DIR__ . '/src',
        __DIR__ . '/database',
        __DIR__ . '/tests',
        __DIR__ . '/ecs.php',
    ]);

    $config->import(SetList::ARRAY);
    $config->import(SetList::STRICT);
    $config->import(SetList::SPACES);
    $config->import(SetList::NAMESPACES);
    $config->import(SetList::CONTROL_STRUCTURES);
    $config->import(SetList::DOCBLOCK);
    $config->import(SetList::PSR_12);
    $config->import(SetList::CLEAN_CODE);

    $config->services()
        ->set(FinalClassFixer::class)
        ->set(VoidReturnFixer::class)
        ->set(DeclareStrictTypesFixer::class)
        ->set(OrderedImportsFixer::class)
        ->call('configure', [[
            'sort_algorithm' => 'length',
        ]])
        ->set(PhpUnitMethodCasingFixer::class)
        ->call('configure', [[
            'case' => 'snake_case',
        ]]);
};
