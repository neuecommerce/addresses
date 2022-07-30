<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use NeueCommerce\Addresses\Contracts\HasOneAddressInterface;

trait HasOneAddress
{
    public static function bootHasOneAddress(): void
    {
        static::deleted(function (HasOneAddressInterface $model) {
            if (! method_exists(static::class, 'isForceDeleting') || $model->isForceDeleting()) {
                $model->address()->delete();
            }
        });
    }

    public function address(): MorphOne
    {
        $model = config('neuecommerce.addresses.model.class');

        return $this->morphOne($model, 'entity');
    }
}
