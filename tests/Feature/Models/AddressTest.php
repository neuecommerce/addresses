<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Tests\Feature\Models;

use NeueCommerce\Addresses\Models\Address;
use NeueCommerce\Addresses\Tests\Doubles\Factories\Models\AddressFactory;
use NeueCommerce\Addresses\Tests\Doubles\Factories\Models\OrderFactory;
use NeueCommerce\Addresses\Tests\Doubles\Models\Order;
use NeueCommerce\Addresses\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;

final class AddressTest extends TestCase
{
    #[Test]
    #[TestDox('An address can be added and removed from an entity')]
    public function test_1()
    {
        $entity = OrderFactory::new()->create();

        $address = AddressFactory::new()->make();

        $entity->addresses()->save($address);

        $this->assertCount(1, $entity->addresses);
        $this->assertInstanceOf(Order::class, $entity->addresses->first()->entity);

        $address->delete();

        $entity->refresh();

        $this->assertCount(0, $entity->addresses);
    }

    #[Test]
    #[TestDox('When an entity is soft deleted, all the related addresses are not removed')]
    public function test_2()
    {
        $entity = OrderFactory::new()->create();

        $address1 = AddressFactory::new()->make();
        $address2 = AddressFactory::new()->make();

        $entity->addresses()->saveMany([$address1, $address2]);

        $this->assertCount(2, $entity->addresses);

        $entity->delete();

        $this->assertCount(2, $entity->addresses);
        $this->assertCount(2, Address::get());
    }

    #[Test]
    #[TestDox('When an entity is force deleted, all the related addresses are removed')]
    public function test_3()
    {
        $entity = OrderFactory::new()->create();

        $address1 = AddressFactory::new()->make();
        $address2 = AddressFactory::new()->make();

        $entity->addresses()->saveMany([$address1, $address2]);

        $this->assertCount(2, $entity->addresses);

        $entity->forceDelete();

        $this->assertCount(0, Address::get());
    }
}
