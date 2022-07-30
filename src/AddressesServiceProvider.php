<?php

declare(strict_types = 1);

namespace NeueCommerce\Addresses;

use Illuminate\Support\ServiceProvider;

class AddressesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerResources();

        $this->offerPublishing();
    }

    public function register()
    {
        $this->configure();
    }

    private function configure(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/addresses.php', 'neuecommerce.addresses'
        );
    }

    private function registerResources(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(
                __DIR__.'/../database/migrations'
            );
        }
    }

    private function offerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
            ], ['neuecommerce', 'migrations', 'neuecommerce-addresses-migrations']);

            $this->publishes([
                __DIR__.'/../config/addresses.php' => $this->app->configPath('neuecommerce/addresses.php'),
            ], ['neuecommerce', 'config', 'neuecommerce-addresses-config']);
        }
    }
}
