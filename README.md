# Addresses for Laravel

[![GitHub Tests Action Status][icon-action-tests]][url-action-tests]
[![GitHub Code Analysis Action Status][icon-action-analysis]][url-action-analysis]
[![Software License][icon-license]][url-license]
[![Latest Version on Packagist][icon-packagist-version]][url-packagist]
[![Total Downloads][icon-packagist-downloads]][url-packagist]

Addresses is a polymorphic Laravel package, for addressbook management.

Adding addresses to any Eloquent model was never this easy and the possibilities of address organisation is also possible since you'll be able to assign a custom type like `shipping`, `billing`, etc.. to each address, which gives the possibility of having one default address per type of address.
For example, have one default `shipping address` and one default `billing address`, which is very common on e-commerce applications.

## Installation

1. Install the package via Composer:

```sh
composer require neuecommerce/addresses
```

2. Publish the migrations (optional):

```sh
php artisan vendor:publish --tag="neuecommerce-addresses-migrations"
```

3. Publish the configuration file (optional):

```sh
php artisan vendor:publish --tag="neuecommerce-addresses-config"
```

4. Run the migrations:

```sh
php artisan migrate
```

## Implementation

In order to add addresses support to your Eloquent models, you'll need to ensure that your model implements the `NeueCommerce\Addresses\Contracts\HasManyAddressesInterface` interface and the `NeueCommerce\Addresses\Traits\HasManyAddresses` trait.

Here's an example of a model with the proper implementation:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use NeueCommerce\Addresses\Contracts\HasManyAddressesInterface;
use NeueCommerce\Addresses\Traits\HasManyAddresses;

class Customer extends Model implements HasManyAddressesInterface
{
    use HasManyAddresses;

    public $table = 'customers';
}
```

## Usage

In this section you'll learn how to use the address package and manage the addresses of your Eloquent Models.

For simplicity, the entity we'll use will be of a `Customer` entity (the one we created on the previous section):

```php
$customer = Customer::first();
```

#### Create a new Address

Creating new addresses is very simple.

##### Example:

```php
$address = $customer->addresses()->create([
    'type' => 'shipping',
    'display_name' => 'Default Shipping Address',
    'first_name' => 'John',
    'last_name' => 'Done',
    'address_1' => '3327 Colby Ave',
    'city' => 'Everett',
    'country_code' => 'US',
    'state' => 'Washington',
    'postal_code' => '98201',
    'latitude' => '47.972829',
    'longitude' => '-122.20793',
    'is_default' => true,
]);
```

#### Update an existing Address

To update an address, you'll need to fetch the address you want to update and then call the `update()` method on that address instance while providing the updated attributes.

##### Example:

```php
// Find the address to update
$address = $customer->addresses()->whereType('shipping')->whereDefault()->first();

// Update the address
$address->update([
    'display_name' => 'Home Shipping Address',
]);
```

#### Delete an Address

To delete an address, you'll need to fetch the address you want to delete and then call the `delete()` method on that address instance.

##### Example:

```php
// Find the address to delete
$address = $customer->addresses()->whereType('shipping')->whereDefault()->first();

// Delete the address
$address->delete();
```

## Testing

```shell
composer test
```

## Contributing

Thank you for your interest. Here are some of the many ways to contribute.

- Check out our [contributing guide](/.github/CONTRIBUTING.md)
- Look at our [code of conduct](/.github/CODE_OF_CONDUCT.md)

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[url-action-tests]: https://github.com/neuecommerce/addresses/actions?query=workflow%3Atests
[url-action-analysis]: https://github.com/neuecommerce/addresses/actions?query=workflow%3Acode-analysis
[url-packagist]: https://github.com/neuecommerce/neuecommerce
[url-license]: https://opensource.org/licenses/MIT

[icon-action-tests]: https://github.com/neuecommerce/addresses/actions/workflows/tests.yml/badge.svg?branch=main
[icon-action-analysis]: https://github.com/neuecommerce/addresses/actions/workflows/code-analysis.yml/badge.svg?branch=main
[icon-license]: https://img.shields.io/github/license/neuecommerce/addresses?label=License
[icon-packagist-version]: https://img.shields.io/packagist/v/neuecommerce/addresses.svg?label=Packagist
[icon-packagist-downloads]: https://img.shields.io/packagist/dt/neuecommerce/addresses.svg?label=Downloads
