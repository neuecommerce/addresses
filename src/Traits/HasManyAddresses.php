<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use NeueCommerce\Addresses\Contracts\HasManyAddressesInterface;

trait HasManyAddresses
{
    public static function bootHasManyAddresses(): void
    {
        static::deleted(function (HasManyAddressesInterface $model) {
            if (! method_exists(static::class, 'isForceDeleting') || $model->isForceDeleting()) {
                $model->addresses()->delete();
            }
        });
    }

    public function addresses(): MorphMany
    {
        $model = config('neuecommerce.addresses.model.class');

        return $this->morphMany($model, 'entity');
    }
}
