<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
        ->ignoreDotFiles(false)
        ->in([
            'src',
            'tests',
        ])
        ->exclude('gii')
        ->exclude('mail');

$config = new PhpCsFixer\Config();

// https://cs.symfony.com/doc/rules/index.html
// https://cs.symfony.com/doc/ruleSets/index.html
return $config
        ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
        ->setCacheFile('./runtime/.php-cs-fixer.cache')
        ->setRiskyAllowed(true)
        ->setRules([
            // 严格模式拉满
            'declare_strict_types' => true,
            // 严格模式比较
            'strict_comparison' => true,
            'strict_param' => true,
            '@PHP81Migration' => true,
            '@Symfony' => true,
            // https://cs.symfony.com/doc/rules/phpdoc/phpdoc_no_alias_tag.html
            // 不应使用 PHPDoc 别名标签。
            'phpdoc_no_alias_tag' => false,
            // PHPDoc 摘要应该以句号、感叹号或问号结尾
            'phpdoc_summary' => false,
        ])
        ->setFinder($finder);
