<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasManyAddressesInterface
{
    /**
     * Returns addresses that this entity has.
     */
    public function addresses(): MorphMany;
}
