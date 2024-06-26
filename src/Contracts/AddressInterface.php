<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Contracts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;
use NeueCommerce\Addresses\Enums\Country;

/**
 * @property int $id
 * @property string $type
 * @property string $display_name
 * @property string|null $company_name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $address_1
 * @property string|null $address_2
 * @property string|null $city
 * @property Country|null $country
 * @property string|null $state
 * @property string|null $postal_code
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $phone
 * @property string|null $notes
 * @property Collection $metadata
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
interface AddressInterface
{
    public function entity(): MorphTo;
}
