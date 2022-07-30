<?php

declare(strict_types = 1);

use Symplify\EasyCodingStandard\Config\ECSConfig;
use NeueCommerce\CodingStandards\Config\NeueCommerceEcsConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/database',
        __DIR__ . '/tests',
    ]);

    NeueCommerceEcsConfig::setup($ecsConfig);
};
