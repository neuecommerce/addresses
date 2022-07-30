<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property AddressInterface|null $address
 */
interface HasOneAddressInterface
{
    /**
     * Returns the address that this entity has.
     */
    public function address(): MorphOne;
}
