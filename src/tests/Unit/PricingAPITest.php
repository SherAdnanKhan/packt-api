<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PricingAPITest extends TestCase
{

    use WithFaker, RefreshDatabase;

    public function testItCanGetPricingForProductByIsbn()
    {
        $this->createUserAndToken(['PI']);

        $response = $this->getJson(
            route('productPrice', ['sku' => '9781789956177']),
            $this->headers
        );

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'prices' => []
        ]);

    }

    public function testItCanGetPricingForProductByIsbnAndIso()
    {

         $this->createUserAndToken(['PI']);

        $response = $this->getJson(route('productPrice', ['sku' => '9781789956177', 'code' => 'GBP']), $this->headers);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'prices' => ['print' => ['GBP']]
        ]);

    }
}
