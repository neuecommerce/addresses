<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateAddressesTable extends Migration
{
    public function up(): void
    {
        Schema::create($this->tableName(), function (Blueprint $table) {
            $table->id();

            $table->boolean('is_default')->default(0)->index();

            $table->morphs('entity');

            $table->string('type')->index();

            $table->string('display_name');
            $table->string('company_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country', 2)->nullable();
            $table->string('state')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('phone')->nullable();
            $table->string('notes')->nullable();

            $table->timestampsTz();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName());
    }

    public function getConnection(): string | null
    {
        return config('neuecommerce.addresses.model.database_connection');
    }

    private function tableName(): string
    {
        return config('neuecommerce.addresses.model.table_name');
    }
}
