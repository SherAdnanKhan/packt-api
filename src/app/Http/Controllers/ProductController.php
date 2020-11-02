<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product;
use App\Services\Api\ProductHttpService;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @param $product
     * @param ProductHttpService $productService
     * @param Request $request
     * @return array|JsonResponse
     */
    public function show($product, ProductHttpService $productService, Request $request)
    {
        try {
            return $productService->getProductInfo($product);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => true,
                    'message' => $e->getMessage()
                ], $e->getCode());
        }

    }

}
