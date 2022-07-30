<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Tests\Doubles\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NeueCommerce\Addresses\Contracts\HasManyAddressesInterface;
use NeueCommerce\Addresses\Traits\HasManyAddresses;

final class Order extends Model implements HasManyAddressesInterface
{
    use SoftDeletes;
    use HasManyAddresses;

    public $table = 'orders';
}
