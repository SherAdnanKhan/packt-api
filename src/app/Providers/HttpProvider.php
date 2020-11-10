<?php

namespace App\Providers;

use App\Services\Api\ProductHttpService;
use App\Services\Api\AuthorHttpService;
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
