<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PricingAPITest extends TestCase
{

    use WithFaker, RefreshDatabase;

    public function testItCanGetPricingForProductByIsbn()
    {

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->getJson(route('productPrice', ['sku' => '9781789956177']));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'prices' => []
        ]);

    }



    public function testItCanGetPricingForProductByIsbnAndIso()
    {

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->getJson(route('productPrice', ['sku' => '9781789956177', 'code' => 'GBP']));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'prices' => ['print' => ['GBP']]
        ]);

    }

}
