<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ArkEcosystem\Crypto\Networks\Mainnet;
use ArkEcosystem\Crypto\Configuration\Network;

class ArkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Network::set(Mainnet::new());
    }

    /**
     * Register services.
     */
    public function register()
    {
        if (! defined('ARKTOSHI')) {
            define('ARKTOSHI', 10 ** 8);
        }
    }
}
