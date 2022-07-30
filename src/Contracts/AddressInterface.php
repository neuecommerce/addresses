<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Contracts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use PrinsFrank\Standards\Country\CountryAlpha2;
use PrinsFrank\Standards\Country\Subdivision\CountrySubdivision;

/**
 * @property int $id
 * @property string $type
 * @property string $display_name
 * @property string|null $company_name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $address_1
 * @property string|null $address_2
 * @property string|null $postal_code
 * @property string|null $city
 * @property CountryAlpha2|null $country
 * @property CountrySubdivision|null $state
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $phone
 * @property string|null $notes
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
interface AddressInterface
{
    public function entity(): MorphTo;
}
