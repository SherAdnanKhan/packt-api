<?php

namespace Tests\Feature;

use App\Models\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class APILogTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_it_can_make_an_api_log_when_test_api_is_called()
    {

        $user = $this->createUserAndToken(['TEST']);

        $response = $this->get(
            route('test'),
            $this->headers
        );

        $response->assertStatus(200);
        $log = Log::where('message', $user->id)->orderByDesc('created_at')->first();

        $this->assertEquals($log->context['endpointName'], 'Test');
        $this->assertEquals($log->context['status'], 'OK');
    }

    public function test_it_make_an_api_log_when_we_retrieve_all_products()
    {
        $user = $this->createUserAndToken(['PI']);

        $response = $this->get(
            route('products.index'),
            $this->headers
        );

        $response->assertStatus(200);

        $log = Log::where('message', $user->id)->orderByDesc('created_at')->first();

        $this->assertEquals($log->context['status'], 'OK');
        $this->assertEquals($log->context['endpointName'], 'Product');
        $this->assertEquals($log->context['description'], 'List Products');
    }


    public function test_it_make_an_api_log_when_we_get_one_product_by_sku()
    {
        $user = $this->createUserAndToken(['PI']);
        $sku = '9781789956177';

        $response = $this->getJson(
            route('products.show', ['product' => $sku]),
            $this->headers
        );

        $response->assertStatus(200);

        $log = Log::where('message', $user->id)->orderByDesc('created_at')->first();

        $this->assertEquals($log->context['status'], 'OK');
        $this->assertEquals($log->context['endpointName'], 'Product');
        $this->assertEquals($log->context['description'], 'GET ' . $sku);
    }

    public function test_it_make_an_api_log_when_we_retrieve_a_large_cover_image()
    {
        $user = $this->createUserAndToken(['PI']);
        $sku = '9781789956177';

        $response = $this->getJson(
            route('coverImages', ['sku' => $sku, 'size' => 'large']),
            $this->headers
        );

        $response->assertStatus(200);

        $log = Log::where('message', $user->id)->orderByDesc('created_at')->first();

        $this->assertEquals($log->context['status'], 'OK');
        $this->assertEquals($log->context['endpointName'], 'Product');
        $this->assertEquals($log->context['description'], 'GET ' . $sku . ' Image');
    }


    public function test_it_make_an_api_log_when_we_retrieve_author_details_by_sku()
    {
        $user = $this->createUserAndToken(['PI']);
        $sku = '9781789956177';

        $response = $this->getJson(
            route('productAuthors', ['sku' => $sku]),
            $this->headers
        );

        $response->assertStatus(200);

        $log = Log::where('message', $user->id)->orderByDesc('created_at')->first();

        $this->assertEquals($log->context['status'], 'OK');
        $this->assertEquals($log->context['endpointName'], 'Product');
        $this->assertEquals($log->context['description'], 'GET ' . $sku . ' Authors');
    }

    public function test_it_make_an_api_log_when_we_fetch_product_price_details_by_sku()
    {
        $user = $this->createUserAndToken(['PI']);
        $sku = '9781789956177';
        $code = 'GBP';

        $response = $this->getJson(route('productPrice', ['sku' => $sku, 'code' => $code]), $this->headers);

        $response->assertStatus(200);

        $log = Log::where('message', $user->id)->orderByDesc('created_at')->first();

        $this->assertEquals($log->context['status'], 'OK');
        $this->assertEquals($log->context['endpointName'], 'Product');
        $this->assertEquals($log->context['description'], "GET {$sku} price in {$code}");

    }
}
