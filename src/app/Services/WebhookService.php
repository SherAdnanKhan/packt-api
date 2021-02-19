<?php

namespace App\Services;

use App\Models\WebhookURL;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Str;

class WebhookService extends BaseService
{

    /**
     * @param string $url
     * @param string $method
     * @return false
     */
    public function testWebhookURL(string $url, string $method = 'POST'): bool
    {
        try {

            /** @var \GuzzleHttp\Client $client */
            $client = app(Client::class);

            $response = $client->request($method, $url, [
                'timeout' => 5
            ]);

            if (! Str::startsWith($response->getStatusCode(), 2)) {
                throw new Exception('Webhook call failed');
            }

        } catch (Exception | GuzzleException $exception) {
            return false;
        }

        return true;
    }

    /**
     * @param int $userID
     * @return mixed
     */
    public function getWebhookURL(int $userID)
    {
        return WebhookURL::where('user_id', $userID)->first();
    }

    /**
     * @param string $url
     * @param int $userID
     * @return bool
     */
    public function saveWebhookURL(string $url, bool $canary, int $userID) : bool
    {
        $webhook = WebhookURL::where(['user_id' => $userID])->first();
        if(!$webhook) {
            $webhook = new WebhookURL();
        }

        $webhook->url = $url;
        $webhook->user_id = $userID;
        $webhook->canary = $canary;
        return $webhook->save();
    }
}
