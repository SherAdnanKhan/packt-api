<?php

namespace App\Http\Controllers;

use App\Services\WebhookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebhookController extends Controller
{
    public function webhook()
    {
        return view('webhook');
    }

    /**
     * @param Request $request
     * @param WebhookService $webhookService
     * @return JsonResponse
     */
    public function test_webhook_url(Request $request, WebhookService $webhookService): JsonResponse
    {
        $validator = Validator::make($request->post(), [
            'url' => 'required|url',
            'canary' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 419);
        }

        $webhook = $webhookService->testWebhookURL(
            $request->post('url')
        );

        if($webhook) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    /**
     * @param Request $request
     * @param WebhookService $webhookService
     * @return JsonResponse
     */
    public function get_webhook_url(Request $request, WebhookService $webhookService): JsonResponse
    {
        $getURL = $webhookService->getWebhookURL(
            auth()->user()->id
        );

        if($getURL) {
            return response()->json(['success' => true, 'data' => $getURL]);
        }
        return response()->json(['success' => false], 404);
    }

    /**
     * @param Request $request
     * @param WebhookService $webhookService
     * @return JsonResponse
     */
    public function save_webhook_url(Request $request, WebhookService $webhookService): JsonResponse
    {
        $validator = Validator::make($request->post(), [
            'url' => 'required|url',
            'canary' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 419);
        }

        $saveURL = $webhookService->saveWebhookURL(
            $request->post('url'),
            $request->post('canary'),
            auth()->user()->id
        );

        if($saveURL) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }
}
