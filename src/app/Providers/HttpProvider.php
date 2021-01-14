<?php

namespace App\Providers;

use App\Services\Api\ProductHttpService;
use App\Services\Api\AuthorHttpService;
use App\Services\Api\ProductFileHttpService;
use App\Services\Api\PriceHttpService;
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
        $this->app->singleton(AuthorHttpService::class, function () {
            return new AuthorHttpService(new Client(), 'https://static.packt-cdn.com/authors/');
        });
        $this->app->singleton(ProductFileHttpService::class, function () {
            return new ProductFileHttpService(new Client(), config('services.entitlement_url'));
       });
	 $this->app->singleton(PriceHttpService::class, function () {
            return new PriceHttpService(new Client(), 'https://services.packtpub.com/product-price-v1/product-price/');
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
