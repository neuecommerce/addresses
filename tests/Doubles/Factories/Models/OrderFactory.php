<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Tests\Doubles\Factories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use NeueCommerce\Addresses\Tests\Doubles\Models\Order;

final class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
        ];
    }
}
