<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Tests\Doubles\Factories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use NeueCommerce\Addresses\Models\Address;

final class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'type'         => $this->faker->randomElement(['shipping', 'billing']),
            'display_name' => 'My first address',
            'first_name'   => $this->faker->firstName,
            'last_name'    => $this->faker->lastName,
            'address_1'    => $this->faker->address,
        ];
    }
}
