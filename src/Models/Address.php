<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use NeueCommerce\Addresses\Contracts\AddressInterface;
use NeueCommerce\Addresses\Enums\Country;
use NeueCommerce\DefaultRecords\HasDefaultRecord;
use NeueCommerce\DefaultRecords\HasDefaultRecordInterface;
use PrinsFrank\Standards\Country\CountryAlpha2;
use PrinsFrank\Standards\Country\Subdivision\CountrySubdivision;

class Address extends Model implements AddressInterface, HasDefaultRecordInterface
{
    use SoftDeletes;
    use HasDefaultRecord;

    protected $guarded = ['*'];

    protected $casts = [
        'country' => CountryAlpha2::class,
        'state'   => CountrySubdivision::class,
    ];

    public function __construct(array $attributes = [])
    {
        if (! isset($this->connection)) {
            $this->setConnection(config('neuecommerce.addresses.model.database_connection'));
        }

        if ($this->table === '') {
            $this->setTable(config('neuecommerce.addresses.model.table_name'));
        }

        parent::__construct($attributes);
    }

    public function entity(): MorphTo
    {
        return $this->morphTo();
    }
}
