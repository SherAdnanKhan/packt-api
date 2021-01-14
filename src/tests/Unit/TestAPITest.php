<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class TestAPITest extends TestCase
{

    use WithFaker, RefreshDatabase;

    public function test_it_can_retrieve_test_endpoint_data()
    {

        $user =  User::factory()->create();

        $token = $user->createToken(
            'test',
            Jetstream::validPermissions(['TEST']),
            false
        )->plainTextToken;

        $response = $this->get(route('testEndpoint'), [
            'Authorization' => 'Bearer '.$token
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'system',
            'token',
            'token_access',
            'token_last_used'
        ]);
    }

}
