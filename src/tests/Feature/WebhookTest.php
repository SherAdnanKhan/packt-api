<?php

namespace Tests\Feature;

use App\Models\Log;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebhookTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_it_can_test_a_valid_webhook_url()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $postBody = [
            'url' => 'http://bbc.co.uk',
            'canary' => $this->faker->randomElement([
                true, false
            ])
        ];

        $response = $this->post('/test-webhook-url', $postBody);

        $response->assertJson(['success' => true]);
    }

    public function test_it_can_test_a_invalid_webhook_url()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $postBody = [
            'url' => 'http://example.comm/invalid',
            'canary' => $this->faker->randomElement([
                true, false
            ])
        ];

        $response = $this->post('/test-webhook-url', $postBody);

        $response->assertJson(['success' => false]);
    }

    public function test_it_can_save_a_webhook_url()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $postBody = [
            'url' => 'http://example.com',
            'canary' => $this->faker->randomElement([
                true, false
            ])
        ];

        $response = $this->post('/save-webhook-url', $postBody);

        $response->assertJson(['success' => true]);
    }
}
