<?php

namespace Tests\Feature;

use App\Jobs\CanaryTestJob;
use App\Models\WebhookURL;
use App\Services\WebhookService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CanaryTestJobTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_it_can_send_canary_test_and_mark_non_working_urls()
    {

        $url = WebhookURL::factory()->create([
            'url' => 'http://example.commxxx/', //broken URL
            'canary' => true,
            'status' => true
        ]);

        $job = (new CanaryTestJob())->dispatch();

        Log::shouldReceive('info')
            ->once()
            ->withArgs(function ($message) {
                return strpos($message, 'CanaryTestJob - http://example.commxxx/ - false') !== false;
            });
      
    }
}
