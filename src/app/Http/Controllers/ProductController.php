<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product;
use App\Services\Api\ProductHttpService;
use App\Traits\LogTrait;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    use LogTrait;

    /**
     * @param $product
     * @param ProductHttpService $productService
     * @param Request $request
     * @return array|JsonResponse
     */
    public function show($product, ProductHttpService $productService, Request $request)
    {
        try {
            $this->logInfo('info', 'User has access Product API', $request);
            return $productService->getProductInfo($product);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => true,
                    'message' => $e->getMessage()
                ], $e->getCode());
        }

    }

    /**
     * @param int $sku
     * @param string $size
     * @param ProductHttpService $productHttpService
     * @return Application|ResponseFactory|Response|void
     */
    public function getCoverImage(
        int $sku,
        string $size,
        ProductHttpService $productHttpService
    )
    {
        try {

            $response =  $productHttpService->getProductImage($sku, $size);
            return response($response['image'])->header('Content-Type', 'image/jpeg');

        } catch (\Exception $e) {
            return abort(404);
        }
    }

}
