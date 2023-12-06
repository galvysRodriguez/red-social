<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__.'/app',
        __DIR__.'/routes',
        __DIR__.'/resources',
        __DIR__.'/public',
        __DIR__.'/config',
        __DIR__.'/database',
        // Agrega otras carpetas según la estructura de tu proyecto
    ])
    ->exclude('vendor');

$config = new PhpCsFixer\Config();
$config->setRules([
    '@PSR12' => true,
]);
$config->setFinder($finder);

return $config;
