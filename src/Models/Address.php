<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use NeueCommerce\Addresses\Contracts\AddressInterface;
use NeueCommerce\DefaultRecords\HasDefaultRecord;
use NeueCommerce\DefaultRecords\HasDefaultRecordInterface;
use NeueCommerce\ModelCasts\CollectionCast;

class Address extends Model implements AddressInterface, HasDefaultRecordInterface
{
    use SoftDeletes;
    use HasDefaultRecord;

    protected $guarded = ['*'];

    protected $casts = [
        'metadata' => CollectionCast::class,
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
