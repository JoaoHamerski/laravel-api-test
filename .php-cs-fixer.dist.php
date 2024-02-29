<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->ignoreVCSIgnored(true)
    ->exclude([
        'resource',
    ])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true
    ])
    ->setFinder($finder);
