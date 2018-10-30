<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\Shared\GlobalViewComposer;
use App\Http\ViewComposers\Shared\EncryptedCsrfTokenComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', GlobalViewComposer::class);
        View::composer('*.layouts.*', EncryptedCsrfTokenComposer::class);
    }
}
