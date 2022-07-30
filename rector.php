<?php

declare(strict_types = 1);

use Rector\Config\RectorConfig;
use NeueCommerce\CodingStandards\Config\NeueCommerceRectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->disableParallel();

    NeueCommerceRectorConfig::setup($rectorConfig);

    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/database',
        __DIR__ . '/tests',
    ]);
};
