<?php

namespace App\Jobs;

use App\Models\WebhookURL;
use App\Services\WebhookService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * Class CanaryTestJob
 * Run Canary Test Job every 8 hour, send Webhook Callback to each active URL
 * if the status is not something starting with 2 (e.g. 200,201,202), Job mark that URL `status` to `false`
 * @package App\Jobs
 */
class CanaryTestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @param WebhookService $webhookService
     * @return void
     */
    public function handle(WebhookService $webhookService)
    {
        $allWebhookURLs = WebhookURL::select('url', 'canary', 'status')
            ->where('status', true)
            ->where('canary', true)
            ->get();

        foreach($allWebhookURLs as $eachWebhookURL) {
            $eachWebhookURL->status = $webhookService->testWebhookURL($eachWebhookURL->url);
            $eachWebhookURL->save();
            Log::info("CanaryTestJob - $eachWebhookURL->url - ". ($eachWebhookURL->status ? 'true' : 'false'));
        }
    }
}
