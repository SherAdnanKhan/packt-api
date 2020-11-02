<?php

namespace App\Providers;

use App\Services\Api\ProductHttpService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class HttpProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductHttpService::class, function () {
            return new ProductHttpService(new Client(), 'https://static.packt-cdn.com/');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
